<?php

namespace App\Http\Controllers;

use App\Korisnik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function register(Request $request){
        $korisnik = new Korisnik();
        try {
            $korisnik->ime=$request->get('ime');
            $korisnik->prezime=$request->get('prezime');
            $korisnik->email=$request->get('email');
            $korisnik->lozinka=md5($request->get('lozinka'));
            $korisnik->tipNalogaID=2;
            $korisnik->created_at=date('Y-m-d');
            $korisnik->save();
            return redirect()->route('home');
        }catch (\Exception $ex){
            Log::info($ex->getMessage());
            return redirect()->route('error');
        }

    }
}
