<?php

use Illuminate\Database\Seeder;

class TipInformacijeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipovi=["Opšte informacije","Informacije o završnom radu"];
        foreach ($tipovi as $t){
            DB::table('tip_informacije')->insert(
                ['naziv'=>$t]
            );
        }
    }
}
