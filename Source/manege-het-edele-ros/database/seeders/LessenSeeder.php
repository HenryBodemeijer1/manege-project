<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = date("Y-m-d");
        $datetime = new \DateTime($date .  " 11:11:11");

        DB::table('lessen')->insert([
            'lesdoel' => 'trainen van het dressuur rijden',
            'onderwerp' => 'Dressuur',
            'datetime' => $datetime,
            'instructeur_id' => 2
        ]);

        DB::table('lessen')->insert([
            'lesdoel' => 'Borstel training',
            'onderwerp' => 'Borstel',
            'datetime' => $date,
            'instructeur_id' => 2
        ]);
    }
}
