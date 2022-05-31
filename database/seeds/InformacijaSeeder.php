<?php

use Illuminate\Database\Seeder;

class InformacijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $informacije=[
            [
                "naziv"=>"Pravila polaganja",
                "tip_informacijeID"=>1,
                "link"=>"https://webdizajn.ict.edu.rs/stranica/pravila-polaganja"
            ],
            [
                "naziv"=>"Uvodjenje negativnih bodova",
                "tip_informacijeID"=>1,
                "link"=>"https://webdizajn.ict.edu.rs/stranica/negativni-bodovi"
            ],
            [
                "naziv"=>"Upis ocena",
                "tip_informacijeID"=>1,
                "link"=>"https://webdizajn.ict.edu.rs/stranica/upis-ocena"
            ],
            [
                "naziv"=>"Primeri radova",
                "tip_informacijeID"=>2,
                "link"=>"https://webdizajn.ict.edu.rs/stranica/Primeri_zavr%C5%A1nih_i_specijalisti%C4%8Dkih_radova"
            ],
            [
                "naziv"=>"Informacije",
                "tip_informacijeID"=>2,
                "link"=>"https://webdizajn.ict.edu.rs/informacije-zavrsni-radovi"
            ]

        ];
        foreach ($informacije as $i){
            DB::table('informacija')->insert(
                [
                    'naziv'=>$i["naziv"],
                    'tip_informacijeID'=>$i["tip_informacijeID"],
                    'link'=>$i["link"]

                ]

            );
        }
    }
}
