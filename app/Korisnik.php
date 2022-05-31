<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model
{
    protected $table="korisnik";
    public function tipNaloga()
    {
        return $this->belongsTo(TipNaloga::class);
    }
}
