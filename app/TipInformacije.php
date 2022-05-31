<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipInformacije extends Model
{
    protected $table="tip_informacije";
    public function informacije(){
        return $this->hasMany(Informacija::class,'tip_informacijeID');
    }
}
