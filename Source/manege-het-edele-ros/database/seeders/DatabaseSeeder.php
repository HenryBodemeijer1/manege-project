<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@test.com',
        //     'password' => Hash::make('admintest'),
        //     'role' => 'admin',
        // ]);

        // \App\Models\User::create([
        //     'name' => 'instructeur',
        //     'email' => 'instructeur@test.com',
        //     'password' => Hash::make('instructeurtest'),
        //     'role' => 'admin',
        // ]);

        \App\Models\User::create([
            'naam' => 'leerling',
            'email' => 'test@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'leerling',
            'adres' => 'test',
            'woonplaats' => 'volendam',
            'geboortedatum' => '2000-01-01',
            'ziek' => '0', 
            'tegoed' => '0',
            'actief' => '0',
        ]);

        \App\Models\User::create([
            'naam' => 'instructeur',
            'email' => 'instructeur@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'instructeur',
            'adres' => 'test',
            'woonplaats' => 'edam',
            'geboortedatum' => '2002-01-01',
            'ziek' => '0',
            'tegoed' => '0',
            'actief' => '0',
        ]);
        

        \App\Models\User::create([
            'naam' => 'eigenaar',
            'email' => 'eigenaar@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'eigenaar',
            'adres' => 'test',
            'woonplaats' => 'hoorn',
            'geboortedatum' => '2001-01-01',
            'ziek' => '0',
            'tegoed' => '0',
            'actief' => '0',
        ]);
    }
}
