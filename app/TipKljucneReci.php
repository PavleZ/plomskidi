<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipKljucneReci extends Model
{
    protected $table="tip_kljucne_reci";

    public function kljucneReci(){
            return $this->hasMany(KljucnaRec::class,'tipKljucneReciID');
    }
}
