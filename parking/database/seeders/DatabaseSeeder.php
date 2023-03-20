<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Place;
use App\Models\Reservation;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'a',
            'email' => 'a@a',
            'password' => Hash::make('a'),
            'is_valid' => 1,
            'is_admin' => 1,
        ]);

        Place::create([
            'number' => 'A1',
        ]);
    }
}
