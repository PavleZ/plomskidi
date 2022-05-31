<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informacija extends Model
{
    protected $table="informacija";
    public  function  TipInformacije(){
        return $this->belongsTo(TipInformacije::class);
    }
}
