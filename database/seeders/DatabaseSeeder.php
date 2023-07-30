<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DummyDataSeeder::class,
        ]);

        $password = Hash::make('12345678');
        // ======================================================================
        // =========================== Admin &&  Editor  Section ============================
        // ======================================================================
        User::create([
            'name' => 'Super Admin',
            'email' => 'super_admin@blogging.com',
            'password' => $password,
            'role' => 1,
        ]);
        User::create([
            'name' => 'Editor',
            'email' => 'editor@blogging.com',
            'password' => $password,
            'role' => 2,
        ]);
    }
}
