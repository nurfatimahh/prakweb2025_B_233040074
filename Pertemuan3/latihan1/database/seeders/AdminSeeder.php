<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin',
    'email' => 'admin@donasiku.test',
    'password' => Hash::make('password'),
    'role' => 'admin',
]);
