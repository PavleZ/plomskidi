<?php

use Illuminate\Database\Seeder;

class StavkaPredmetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stavke=[
            "Materijali za predavanja",
            "Materijali za auditorne vežbe",
            "Laboratorijske vežbe",
            "Laboratorijski kolokvijumi",
            "Ispitni rokovi",
            "Raspored kolokvijuma",
            "Dopunski materijali",
            "Ocenjivanje sajtova",
            "Online materijali",
            "Dopunski materijal",
            "Auditorne Vežbe - Snimci",
            "Ocenjivanje sajtova - ispit",
            "Ocenjivanje sajta - predispitna obaveza",
            "Kodovi sa predavanja",
            "Izrada dokumentacije",
            "Materijali za predavanja-napredni kurs",
            "Ispitni rokovi - napredni kurs",
            "Testovi",
            "Auditorne vežbe - snimci i projekti (2020)",
            "Ocenjivanje projekta",
            "Uputstvo za izradu projekata",
            "Projekti - SMS Gateway"
        ];

        foreach ($stavke as $s){
            DB::table('stavka_predmeta')->insert(
                ['naziv'=>$s]
            );

        }
    }
}
