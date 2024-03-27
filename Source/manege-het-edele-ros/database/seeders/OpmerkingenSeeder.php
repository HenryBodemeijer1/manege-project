<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpmerkingenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('opmerkingen')->insert([
            'opmerking' => 'het was een leuke les',
            'lessen_id' => 1
        ]);
    }
}
