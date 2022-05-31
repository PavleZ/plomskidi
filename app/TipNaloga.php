<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipNaloga extends Model
{
    protected $table="tip_naloga";
    public function korisnici(){
        return $this->hasMany(Korisnik::class,'tipNalogaID');
    }
}
