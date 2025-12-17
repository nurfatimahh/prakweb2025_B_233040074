<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'username')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('username')->nullable()->unique()->after('name');
            });

            // Backfill usernames from name if users exist
            try {
                $users = DB::table('users')->get();
                foreach ($users as $user) {
                    $base = Str::slug($user->name ?: 'user');
                    $username = $base . ($user->id ?? random_int(1000,9999));
                    // Ensure uniqueness
                    $idx = 1;
                    $candidate = $username;
                    while (DB::table('users')->where('username', $candidate)->exists()) {
                        $candidate = $username . $idx;
                        $idx++;
                    }
                    DB::table('users')->where('id', $user->id)->update(['username' => $candidate]);
                }
            } catch (\Throwable $e) {
                // ignore backfill problems during migration in dev
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('users') && Schema::hasColumn('users', 'username')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropUnique(['username']);
                $table->dropColumn('username');
            });
        }
    }
};
