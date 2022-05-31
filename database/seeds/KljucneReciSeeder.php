<?php

use Illuminate\Database\Seeder;

class KljucneReciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $kr=[
           ["wd",1,1],
           ["web",1,1],
           ["dizajn",1,1],
           ["praktikum",2,1],
           ["pwd",2,1],
           ["web",2,1],
           ["dizajn",2,1],
           ["web",3,1],
           ["programiranje",3,1],
           ["wp1",3,1],
           ["wp",3,1],
           ["wp",4,1],
           ["web",4,1],
           ["programiranje",4,1],
           ["php1",4,1],
           ["php",4,1],
           ["web",5,1],
           ["wp",5,1],
           ["programiranje",5,1],
           ["wp2",5,1],
           ["praktikum",6,1],
           ["wp",6,1],
           ["php",6,1],
           ["pphp",6,1],
           ["programiranje",6,1],
           ["wp",7,1],
           ["programiranje",7,1],
           ["web",7,1],
           ["php",7,1],
           ["php2",7,1],
           ["wp",8,1],
           ["web",8,1],
           ["programiranje",8,1],
           ["asp",8,1],
           ["praktikum",9,1],
           ["wp",9,1],
           ["web",9,1],
           ["programiranje",9,1],
           ["pwp",9,1],
           ["wp",10,1],
           ["web",10,1],
           ["programiranje",10,1],
           ["napredno",11,1],
           ["web",11,1],
           ["programiranje",11,1],
           ["nwp",11,1],
           ["web",12,1],
           ["tehnologije",12,1],
           ["wt",12,1],
           ["materijali",1,2],
           ["predavanja",1,2],
           ["materijali",2,2],
           ["auditorne",2,2],
           ["vezbe",2,2],
           ["laboratorijske",3,2],
           ["vezbe",3,2],
           ["lab vezbe",3,2],
           ["laboratorisjki",4,2],
           ["kolokvijum",4,2],
           ["lab kolokvijum",4,2],
           ["lab klk",4,2],
           ["ispitni",5,2],
           ["rokovi",5,2],
           ["raspored",6,2],
           ["kolokvijuma",6,2],
           ["raspored klk",6,2],
           ["dopunski",7,2],
           ["materijali",7,2],
           ["ocenjivanje",8,2],
           ["sajtova",8,2],
           ["online",9,2],
           ["materijali",9,2],
           ["materijali",10,2],
           ["dopunski",10,2],
           ["auditorne",11,2],
           ["vezbe",11,2],
           ["snimci",11,2],
           ["ocenjivanje",12,2],
           ["sajtova",12,2],
           ["ispit",12,2],
           ["ocenjivanje",13,2],
           ["sajta",13,2],
           ["predispitna",13,2],
           ["obaveza",13,2],
           ["kodovi",14,2],
           ["predavanja",14,2],
           ["izrada",15,2],
           ["dokumentacije",15,2],
           ["materijali",16,2],
           ["predavanja",16,2],
           ["napredni",16,2],
           ["ispitni",17,2],
           ["rokovi",17,2],
           ["napredni",17,2],
           ["kurs",17,2],
           ["testovi",18,2],
           ["auditorne",19,2],
           ["vezbe",19,2],
           ["snimci",19,2],
           ["projekti",19,2],
           ["2020",19,2],
           ["ocenjivanje",20,2],
           ["projekta",20,2],
           ["projekta",21,2],
           ["uputstvo",21,2],
           ["projekti",22,2],
           ["sms",22,2],
           ["gateway",22,2],
           ["opste",1,3],
           ["informacije",1,3],
           ["informacije",2,3],
           ["zavrsnom",2,3],
           ["radu",2,3],
           ["pravila",1,4],
           ["polaganja",1,4],
           ["pravila polaganja",1,4],
           ["uvodjenje",2,4],
           ["negativnih",2,4],
           ["bodova",2,4],
           ["Uvodjenje negativnih bodova",2,4],
           ["upis",3,4],
           ["ocena",3,4],
           ["upis ocena",3,4],
           ["primeri",4,4],
           ["radova",4,4],
           ["primeri radova",4,4],
           ["informacije",5,4],
           ["informacije",1,5],
           ["predmetu",1,5],
           ["informacije o predmetu",1,5],
           ["opste",2,5],
           ["informacije",2,5],
           ["opste informacije",2,5],

           [
               "Materijali za predavanja",
               1,
               1
           ],
           [
               "Materijali za auditorne vezbe",
               1,
               1
           ],
           [
               "Laboratorijske vezbe",
               1,
               1
           ],
           [
               "Dopunski materijali",
               1,
               1
           ],
           [
               "Raspored kolokvijuma",
               1,
               1
           ],
           [
               "Ocenjivanje sajtova",
               1,
               1
           ],
           [
               "Laboratorijski kolokvijumi",
               1,
               1
           ],
           [
               "Ispitni rokovi",
               1,
               1
           ],
           [
               "Online materijali",
               1,
               1
           ],
           [
               "Materijali za predavanja",
               2,
               1
           ],
           [
               "Kodovi sa predavanja",
               2,
               1
           ],
           [
               "Ocenjivanje sajta - predispitna obaveza",
               2,
               1
           ],
           [
               "Ocenjivanje sajtova - ispit",
               2,
               1
           ],
           [
               "Online materijali",
               2,
               1
           ],
           [
               "Materijali za predavanja",
               3,
               1
           ],
           [
               "Materijali za auditorne vezbe",
               3,
               1
           ],
           [
               "Dopunski materijali",
               3,
               1
           ],
           [
               "Raspored kolokvijuma",
               3,
               1
           ],
           [
               "Ocenjivanje sajtova",
               3,
               1
           ],
           [
               "Ispitni rokovi",
               3,
               1
           ],
           [
               "Izrada dokumentacije",
               3,
               1
           ],
           [
               "Online materijali",
               3,
               1
           ],
           [
               "Materijali za predavanja",
               4,
               1
           ],
           [
               "Materijali za auditorne vezbe",
               4,
               1
           ],
           [
               "Laboratorijske vezbe",
               4,
               1
           ],
           [
               "Laboratorijski kolokvijumi",
               4,
               1
           ],
           [
               "Ispitni rokovi",
               4,
               1
           ],
           [
               "Raspored kolokvijuma",
               4,
               1
           ],
           [
               "Dopunski materijali",
               4,
               1
           ],
           [
               "Ocenjivanje sajtova",
               4,
               1
           ],
           [
               "Online materijali",
               4,
               1
           ],
           [
               "Materijali za predavanja",
               5,
               1
           ],
           [
               "Materijali za auditorne vezbe",
               5,
               1
           ],
           [
               "Laboratorijske vezbe",
               5,
               1
           ],
           [
               "Dopunski materijali",
               5,
               1
           ],
           [
               "Ocenjivanje sajtova",
               5,
               1
           ],
           [
               "Raspored kolokvijuma",
               5,
               1
           ],
           [
               "Laboratorijski kolokvijumi",
               5,
               1
           ],
           [
               "Ispitni rokovi",
               5,
               1
           ],
           [
               "Online materijali",
               5,
               1
           ],
           [
               "Materijali za predavanja",
               6,
               1
           ],
           [
               "Materijali za auditorne vezbe",
               6,
               1
           ],
           [
               "Laboratorijske vezbe",
               6,
               1
           ],
           [
               "Laboratorijski kolokvijumi",
               6,
               1
           ],
           [
               "Raspored kolokvijuma",
               6,
               1
           ],
           [
               "Ocenjivanje sajtova",
               6,
               1
           ],
           [
               "Ispitni rokovi",
               6,
               1
           ],
           [
               "Online materijali",
               6,
               1
           ],
           [
               "Materijali za predavanja",
               7,
               1
           ],
           [
               "Materijali za auditorne vezbe",
               7,
               1
           ],
           [
               "Laboratorijske vezbe",
               7,
               1
           ],
           [
               "Dopunski materijali",
               7,
               1
           ],
           [
               "Ocenjivanje sajtova",
               7,
               1
           ],
           [
               "Laboratorijski kolokvijumi",
               7,
               1
           ],
           [
               "Ispitni rokovi",
               7,
               1
           ],
           [
               "Auditorne Vezbe - Snimci",
               7,
               1
           ],
           [
               "Online materijali",
               7,
               1
           ],
           [
               "Materijali za predavanja",
               8,
               1
           ],
           [
               "Materijali za auditorne vezbe",
               8,
               1
           ],
           [
               "Ispitni rokovi",
               8,
               1
           ],
           [
               "Laboratorijski kolokvijumi",
               8,
               1
           ],
           [
               "Dopunski materijali",
               8,
               1
           ],
           [
               "Testovi",
               8,
               1
           ],
           [
               "Auditorne vezbe - snimci i projekti (2020)",
               8,
               1
           ],
           [
               "Ocenjivanje projekta",
               8,
               1
           ],
           [
               "Materijali za predavanja",
               9,
               1
           ],
           [
               "Kodovi sa predavanja",
               9,
               1
           ],
           [
               "Ocenjivanje sajtova",
               9,
               1
           ],
           [
               "Online materijali",
               9,
               1
           ],
           [
               "Materijali za predavanja",
               10,
               1
           ],
           [
               "Materijali za auditorne vezbe",
               10,
               1
           ],
           [
               "Laboratorijske vezbe",
               10,
               1
           ],
           [
               "Dopunski materijali",
               10,
               1
           ],
           [
               "Raspored kolokvijuma",
               10,
               1
           ],
           [
               "Ocenjivanje sajtova",
               10,
               1
           ],
           [
               "Laboratorijski kolokvijumi",
               10,
               1
           ],
           [
               "Ispitni rokovi",
               10,
               1
           ],
           [
               "Laboratorijske vezbe",
               11,
               1
           ],
           [
               "Ispitni rokovi",
               11,
               1
           ],
           [
               "Materijali za predavanja",
               11,
               1
           ],
           [
               "Projekti - SMS Gateway",
               11,
               1
           ],
           [
               "Uputstvo za izradu projekata",
               11,
               1
           ],
           [
               "Materijali za predavanja",
               12,
               1
           ],
           [
               "Materijali za predavanja-napredni kurs",
               12,
               1
           ],
           [
               "Ispitni rokovi - napredni kurs",
               12,
               1
           ],
           [
               "Ispitni rokovi",
               12,
               1
           ],
           [
               "Laboratorijske vezbe",
               12,
               1
           ],
           [
               "Online materijali",
               12,
               1
           ],
           [
               "opste informacije",
               1,
               3
           ],
           [
               "informacije o zavrsnom radu",
               2,
               3
           ],
           [
               "o",
               2,
               3
           ],
           [
               "o",
               1,
               5
           ]
       ];

        foreach ($kr as $k) {
            DB::table('kljucna_rec')->insert(
                ['naziv'=>$k[0],'entitetId'=>$k[1],'tipKljucneReciId'=>$k[2]]
            );
        }
    }
}
