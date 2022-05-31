<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AktivnostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aktivnosti=["Prikaz informacija o predmetu","Prikaz opstih informacija"];

        foreach ($aktivnosti as $a){
            DB::table('aktivnost')->insert(
                ['naziv'=>$a]
            );
        }
    }
}
