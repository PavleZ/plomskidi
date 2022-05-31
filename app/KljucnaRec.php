<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KljucnaRec extends Model
{
    protected $table="kljucna_rec";
    protected $fillable = ['naziv'];

    public  function  predmeti(){
        return $this->belongsToMany(Predmet::class);
    }

    public  function tipKljucneReci(){
        return $this->belongsTo(TipKljucneReci::class);
    }
}
