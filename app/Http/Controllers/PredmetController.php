<?php

namespace App\Http\Controllers;

use App\KljucnaRec;
use App\KljucnaRecLink;
use App\Predmet;
use App\StavkaPredmeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;
use PhpParser\Node\Expr\PreDec;

class PredmetController extends BaseController
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
        $stavkePredmeta=StavkaPredmeta::all();
        $this->data['stavke']=$stavkePredmeta;
        return  view('add-predmet',$this->data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nazivPredmeta=$request->get("naziv");

        $stavkePredmetaId=$request->get("stavke");

       $stavkePredmetaNazivi=DB::table('stavka_predmeta')->select('naziv')->whereIn('id',$stavkePredmetaId)->get();
        $stavkePredmetaNaziviProcessed=[];
        foreach ($stavkePredmetaNazivi as $spn){
            array_push($stavkePredmetaNaziviProcessed,$spn->naziv);
        }

        $stavkePredmetaOdgovori=$request->get("odgovor-stavke");


        try{
            $predmetID = DB::table('predmet')->insertGetId([
                'naziv' => $nazivPredmeta
            ]);
            $stavkePredmetaOdgovoriZaUnos=[];
            foreach ($stavkePredmetaOdgovori as $s){
                if(isset($s))
                    array_push($stavkePredmetaOdgovoriZaUnos,$s);
            }




            for ($i=0;$i < count($stavkePredmetaId); $i++){
                DB::table('predmet_stavka_predmeta')->insert(
                    [
                        'predmetID'=>$predmetID,
                        'stavka_predmetaID'=>$stavkePredmetaId[$i],
                        'odgovor'=>$stavkePredmetaOdgovoriZaUnos[$i]
                    ]
                );
            }

            $nazivPredmetaKljucnaRec=$nazivPredmeta;
            $nazivPredmetaReciKljucnaRec=explode(" ",$nazivPredmeta);

            if(count($nazivPredmetaReciKljucnaRec) > 1){

                array_push($nazivPredmetaReciKljucnaRec,$nazivPredmeta);
            }
            else{
               array_pop($nazivPredmetaReciKljucnaRec);
                array_push($nazivPredmetaReciKljucnaRec,$nazivPredmeta);


            }
            if(count($stavkePredmetaNazivi) > 0){

                foreach ($stavkePredmetaNazivi as $s){
                    array_push($nazivPredmetaReciKljucnaRec,$s->naziv);

                }
            }


            $kljucneReciIds=[];
            $kljucneReciStavke=[];
            $kljucneReciLinkObjs=[];

            foreach ($nazivPredmetaReciKljucnaRec as $k) {

                if(in_array($k,$stavkePredmetaNaziviProcessed)){
                    array_push($kljucneReciStavke,$k);
                    $krId=DB::table('kljucna_rec')->insertGetId([
                        'naziv'=>$k,
                        'entitetId'=>$predmetID,
                        'tipKljucneReciId'=>1

                    ]);
                    array_push($kljucneReciIds,$krId);
                    array_push($kljucneReciLinkObjs,['kid'=>$krId,'naziv'=>$k]);


                }
                else
                {
                  DB::table('kljucna_rec')->insert([
                        'naziv'=>$k,
                        'entitetId'=>$predmetID,
                        'tipKljucneReciId'=>1

                    ]);
                }

        }

            if(count($kljucneReciLinkObjs) > 0){


                $odgovori=DB::table('predmet_stavka_predmeta as psp')->join('stavka_predmeta as sp','psp.stavka_predmetaID','=','sp.id')->select('psp.odgovor','psp.stavka_predmetaID','sp.naziv')
                    ->where('psp.predmetID','=',$predmetID)->whereIn('sp.naziv',$stavkePredmetaNaziviProcessed)->get();

for ($i = 0; $i<count($odgovori);$i++){

    $odgovor=$odgovori[$i]->odgovor;
    $kid=$kljucneReciLinkObjs[$i]['kid'];


    DB::table('kljucna_rec_link')->insert([
        "kljucnaRecId"=>$kid,
        "link"=>$odgovor
    ]);




}




            }


            return  redirect()->route('adminHome');



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
        $stavkePredmeta=DB::table('predmet as p')
            ->join('predmet_stavka_predmeta as psp','p.id','=','psp.predmetID')
            ->join('stavka_predmeta as sp','sp.id','=','psp.stavka_predmetaID')
            ->where('p.id','=',$id)->where('psp.predmetID','=',$id)
            ->select('p.id as predmetID','p.naziv as nazivPredmeta','sp.id as stavkaID','sp.naziv as nazivStavke','psp.odgovor as link')->get();


        $nazivi=[];
        foreach ($stavkePredmeta as $sp){
            array_push($nazivi,$sp->nazivStavke);
        }

        $this->data["stavkePredmeta"] = $stavkePredmeta;
        $ostaleStavke=StavkaPredmeta::whereNotIn('naziv',$nazivi)->get();
        $this->data["ostaleStavke"] = $ostaleStavke;

        $this->data["predmet"]=Predmet::findOrFail($id);
        return view('edit-predmet',$this->data);




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

        $nazivPredmeta=$request->get("naziv");

        $stavkePredmeta=$request->input("stavke");
        $odgovorStavki=$request->get("odgovor-stavke");
        $stavkePredmetaProcessed=[];
        $stavkePredmetaIds=[];
        $stavkePredmetaOdgovori=[];

        $k=0;
        foreach ($stavkePredmeta as $i=>$s){

            $tmp = explode('-',$s);
            $obj= new \stdClass();
            $obj->id=intval($tmp[0]);
            $obj->odgovor=$odgovorStavki[$obj->id-1];




array_push($stavkePredmetaProcessed,$obj);
array_push($stavkePredmetaIds,intval($obj->id));
array_push($stavkePredmetaOdgovori,$obj->odgovor);
$k++;
        }

        $oldStavkePredmeta=DB::table('predmet_stavka_predmeta as psp')->join('stavka_predmeta as sp','psp.stavka_predmetaID','=','sp.id')->where('psp.predmetID','=',$id)->select('sp.id','psp.odgovor')->get();
        $oldStavke = [];
        $oldOdgovori=[];
        $oldStavkePredmetaProcessed=[];
        foreach ($oldStavkePredmeta as $o) {
            array_push($oldStavke, $o->id);
            array_push($oldOdgovori, $o->odgovor);
            array_push($oldStavkePredmetaProcessed,$o);

        }
//        dd($stavkePredmetaProcessed,$oldStavkePredmetaProcessed);


        $matching_objects=[];
        $diff_objects=[];

        foreach ($stavkePredmetaProcessed as $sp){

            if(in_array($sp->id,$oldStavke) && in_array($sp->odgovor,$oldOdgovori))
                array_push($matching_objects,$sp);

            else
            {

                array_push($diff_objects,$sp);

            }
        }


        $differenceArray1 = array_diff($stavkePredmetaIds, $oldStavke);
        $differenceArray2 = array_diff($oldStavke, $stavkePredmetaIds);
        $mergeDifference = array_merge($differenceArray1, $differenceArray2);
        foreach ($mergeDifference as $m){
            foreach ($oldStavkePredmetaProcessed as $o){
                if($o->id == $m)
                    array_push($diff_objects,$o);

            }

        }

//dd($matching_objects,$diff_objects);
     // odrediti da li je objekat za add / delete / update


//        dd($matching_objects,$diff_objects);

        $objsToDelete=[];
        $objsToUpdate=[];
        $objsToAdd=[];
        foreach ($diff_objects as $d){
            if (in_array($d->id,$oldStavke) && !(in_array($d->id,$stavkePredmetaIds))){

                array_push($objsToDelete,$d);
            }
            else if(!in_array($d->id,$oldStavke)) {
                array_push($objsToAdd,$d);

            }
            else{
                array_push($objsToUpdate,$d);

            }


        }
            try{

                $predmet= Predmet::with('stavke')->findOrFail($id);
                $predmet->naziv=$nazivPredmeta;


                $predmet->save();
                $stavka= StavkaPredmeta::findOrFail($o->id);
                $stavkaNaziv=$stavka->naziv;
                if ($objsToAdd){
                    foreach ($objsToAdd as $o){
                        DB::table('predmet_stavka_predmeta')->insert([
                            'predmetID' => $id,
                            'stavka_predmetaID' => $o->id,
                            'odgovor' => $o->odgovor
                        ]);
                        $kljucnaRecId=DB::table('kljucna_rec')->insertGetId([
                            'naziv' => $stavkaNaziv,
                            'entitetId' => $id,
                            'tipKljucneReciId'=>1
                        ]);
                        DB::table('kljucna_rec_link')->insert([
                            'kljucnaRecId' => $kljucnaRecId,
                            'link' => $o->odgovor
                        ]);
                    }


                }
                if ($objsToDelete){
                    foreach ($objsToDelete as $o) {
                     //predmet_stavka_predmeta,kljucna_rec,'kljucna_rec_link
                        DB::table('predmet_stavka_predmeta')->where('predmetID','=',$id)
                            ->where('stavka_predmetaID','=',$o->id)->delete();
                        $kljucnaRec=DB::table('kljucna_rec')->where('entitetId','=',$id)
                            ->where('tipKljucneReciId','=',1)->where('naziv','=',$stavkaNaziv)->first();
                        $kid=$kljucnaRec->id;
                        DB::table('kljucna_rec')->where('entitetId','=',$id)
                            ->where('tipKljucneReciId','=',1)->where('naziv','=',$stavkaNaziv)->where('id','=',$kid)->delete();
                        DB::table('kljucna_rec_link')->where('kljucnaRecId','=',$kid)
                            ->where('link','=',$o->odgovor)->delete();
                    }
                    }
                if ($objsToUpdate){
                    foreach ($objsToUpdate as $o){
                        DB::table('predmet_stavka_predmeta')->where('predmetID','=',$id)
                            ->where('stavka_predmetaID','=',$o->id)->update([
                                'odgovor'=>$o->odgovor
                            ]);
                        $kljucnaRec=DB::table('kljucna_rec')->where('entitetId','=',$id)
                            ->where('tipKljucneReciId','=',1)->where('naziv','=',$stavkaNaziv)->first();
                        $kid=$kljucnaRec->id;
                        DB::table('kljucna_rec_link')->where('kljucnaRecId','=',$kid)
                            ->where('link','=',$o->odgovor)->update([
                                'link'=>$o->odgovor
                            ]);
                    }

                }





                return  redirect()->route('adminHome');

        }catch (Exception $ex){
            Log::info($ex->getMessage());
            return redirect()->route('error');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function destroy($id)
    {
        //
    }
}
