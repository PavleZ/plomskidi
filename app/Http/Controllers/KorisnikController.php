<?php

namespace App\Http\Controllers;

use App\Korisnik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class KorisnikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('add-korisnik');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ime = $request->get('ime');
        $prezime= $request->get('prezime');
        $email=$request->get('email');
        $lozinka=md5($request->get('lozinka'));


        try {

            $korisnik = new Korisnik();
            $korisnik->ime=$ime;
            $korisnik->prezime=$prezime;
            $korisnik->email=$email;
            $korisnik->lozinka=$lozinka;
            $korisnik->tipNalogaID=2;
            $korisnik->save();
            return redirect()->route('adminHome');

        }catch (Exception $ex){
            Log::info($ex->getMessage());
            return redirect()->route('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit-korisnik',['korisnik'=>Korisnik::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $ime=$request->ime;
      $prezime=$request->prezime;
      $email=$request->email;

        try {

            $korisnik = Korisnik::findOrFail($id);
            $korisnik->ime=$ime;
            $korisnik->prezime=$prezime;
            $korisnik->email=$email;
            $korisnik->save();
            return redirect()->route('adminHome');

        } catch (Exception $ex){
            Log::info($ex->getMessage());
            return redirect()->route('error');
        }


//        $korisnik=Korisnik::findOrFail($id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $korisnik=Korisnik::findOrFail($id);
            $korisnik->isDeleted=1;
            $korisnik->save();
            return redirect()->route('adminHome');
        }catch (Exception $ex){
            Log::info($ex->getMessage());
            return redirect()->route('error');
        }
    }

    public function changeStatus(Request $request){
        try {
            $korisnik=Korisnik::findOrFail($request->id);

            $status= $korisnik->isDeleted == 0 ? 1 : 0;

            $korisnik->isDeleted=$status;
            $korisnik->save();
            return redirect()->route('adminHome');
        }
     catch (Exception $ex){
         Log::info($ex->getMessage());
         return redirect()->route('error');
     }




    }
}
