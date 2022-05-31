<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PredmetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $predmeti=["Web dizajn","Praktikum iz Web dizajna","Web programiranje 1","Web programiranje PHP 1","Web programiranje 2","Praktikum iz PHP-a","Web programiranje PHP 2","Web programiranje ASP","Praktikum iz web programiranja","Web programiranje","Napredno web programiranje","Web tehnologije"];
        foreach ($predmeti as $p){
            DB::table('predmet')->insert(
                ['naziv'=>$p]
            );

        }
    }
}
