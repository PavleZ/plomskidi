<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Korisnik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $email=$request->email;
        $password=md5($request->lozinka);


        try{
            $user=DB::table('korisnik as k' )
                ->join('tip_naloga as t', 'k.tipNalogaID','=','t.id')
                ->where('k.email','=',$email)
                ->where('k.lozinka','=',$password)->where('k.isDeleted','=',0)->select('k.id as id','k.ime as ime','k.prezime as prezime','t.naziv as uloga','k.isDeleted as isDeleted')->first();

            $loggedUser=Korisnik::findOrFail($user->id);
            $loggedUser->isLogged=1;

            $loggedUser->save();

            if($user && $user->isDeleted ==0){
                session()->put('korisnik',$user);
                if($user->uloga =='admin')
                    return redirect()->route('adminHome');
                return redirect()->route('userHome');
            }

            return redirect()->route('home')->with('errorMessage',"Wrong email or password!");
        }
        catch (\Exception $ex){
            Log::info($ex->getMessage());
            return redirect()->route('error')->with("errorMsg",$ex);
        }

    }

    public  function logout(Request $request){
        $userid=$request->session()->get('korisnik')->id;

        /* Logging out user */

        $loggedUser=Korisnik::findOrFail($userid);
        $loggedUser->isLogged=0;
        $loggedUser->save();
        /* */

        $request->session()->remove('korisnik');
        return redirect()->route('home');
    }
}
