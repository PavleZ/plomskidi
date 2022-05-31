<?php

namespace App\Http\Controllers;

use App\Aktivnost;
use App\Informacija;
use App\Korisnik;
use App\Predmet;
use App\TipInformacije;
use Illuminate\Http\Request;

class AdminLoginController extends BaseController
{
    public function index(){
        $korisnici=Korisnik::with('tipNaloga')->where('tipNalogaID','=',2)->paginate(3,['*'],'korisnici');
        $this->data['korisnici']=$korisnici;
        $predmeti=Predmet::with('stavke')->paginate(3,['*'],'predmeti');
        $this->data['predmeti']=$predmeti;
        $informacije=Informacija::with('TipInformacije')->paginate(3,['*'],'informacije');
        $this->data['informacije']=$informacije;
        $tipoviInformacija=TipInformacije::with('informacije')->paginate(3,['*'],'tipoviInformacija');
        $this->data['tipoviInformacija']=$tipoviInformacija;
        $aktivnosti=Aktivnost::all();
        $this->data['aktivnosti']=$aktivnosti;


        return view('adminHome',$this->data);
    }
}
