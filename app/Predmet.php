<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predmet extends Model
{
    protected $table="predmet";
    public function stavke(){
        return $this->belongsToMany(StavkaPredmeta::class,"predmet_stavka_predmeta","predmetID","stavka_predmetaID");

    }

//    public function kljucneReci(){
//        return $this->belongsToMany(KljucnaRec::class,"kljucna_rec");
//    }
    
}
