<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Michał Domżalski',
            'email' => 'mimi0192@wp.pl',
            'password' => bcrypt('password'),
            'email_verified_at' => now()
        ]);
    }
}
