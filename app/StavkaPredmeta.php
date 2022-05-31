<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StavkaPredmeta extends Model
{
    protected $table="stavka_predmeta";
    public  function  predmeti(){
        return $this->belongsToMany(Predmet::class,"predmet_stavka_predmeta","stavka_predmetaID","predmetID");
    }

}
