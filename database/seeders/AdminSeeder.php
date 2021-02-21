<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'SpotifyClone',
            'email' => 'admin@spotify-clone.com',
            'date_of_birth' => '1945-08-17',
            'gender' => 2,
            'role' => 0,
            'password' => 'adminspotifyclone',
        ]);
    }
}
