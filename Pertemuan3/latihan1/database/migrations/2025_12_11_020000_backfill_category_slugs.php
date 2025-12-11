<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $categories = DB::table('categories')->get();
        $existing = DB::table('categories')->whereNotNull('slug')->pluck('slug')->toArray();

        foreach ($categories as $c) {
            if (empty($c->slug)) {
                $base = Str::slug($c->name) ?: 'category';
                $slug = $base;
                $i = 1;
                while (in_array($slug, $existing)) {
                    $slug = $base . '-' . $i;
                    $i++;
                }
                DB::table('categories')->where('id', $c->id)->update(['slug' => $slug]);
                $existing[] = $slug;
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // no-op (do not remove slugs on rollback)
    }
};
