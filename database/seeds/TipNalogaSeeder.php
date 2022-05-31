<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TipNalogaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoviNaloga=["admin","student"];
        foreach ($tipoviNaloga as $t){
            DB::table('tip_naloga')->insert(
                ['naziv'=>$t]
            );
        }
    }
}
