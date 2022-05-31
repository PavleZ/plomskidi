<?php

use Illuminate\Database\Seeder;

class TipKljucneReciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipovi=["predmet","stavka_predmeta","tip_informacije","informacija","aktivnost"];
        foreach ($tipovi as $t){
            DB::table('tip_kljucne_reci')->insert(
                ['naziv'=>$t]
            );
        }
    }
}
