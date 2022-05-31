<?php

namespace App\Conversations;

use App\Helpers\AnswerHelper;
use App\Helpers\QuestionHelper;
use App\KljucnaRec;
use App\Predmet;
use App\TipInformacije;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Support\Facades\DB;
use App\TipKljucneReci;


class TestConversation extends Conversation
{
    public function askQuestion()
    {

        $question = Question::create("Test, unesi nesto")->fallback("fallback text");
        $this->say("Ako zelite da pretrazite odredjenu stavku predmeta, na primer zelite materijale za predavanja iz predmeta web dizajn upit bi glasio: 'web dizajn - materijali za predavanja'.Dakle predmet - stavka. Ukoliko zelite samo predmet, unesite samo naziv predmeta.");

        $this->ask($question, function (Answer $answer) {

//    dd(strpos($answer,"-"));
            if(!preg_match('/(-)/', $answer)){

                $answer = explode(" ", $answer);
                $answer= $this->processAnswer($answer);

                $kljucneReci = DB::table('kljucna_rec')->get();
//                dd($kljucneReci);
                $data = $this->getKljucnaRec($kljucneReci, $answer);
//                dd($data);
                $entities = $this->processEntities($data);
//                dd($entities);
//            $processedEntites=$this->processReceivedEntities($answer,$entites);
                $tipoviKljucneReci=$this->getTipovi($entities);
//                dd($tipoviKljucneReci);
                $naziviTipova=$this->proccessTipovi($tipoviKljucneReci);
//                dd($naziviTipova);

//           dd($nt);

                $current=$naziviTipova[0];
//                dd($current);
                    $tmpTableName=$current->naziv;
//                    dd($tmpTableName);
                    $tmpIds=$this->getIdsForCurrentTip($current->id,$entities);
                    $tmpData=DB::table($tmpTableName)->whereIn('id',$tmpIds)->select("*")->get();

//                    dd($tmpData);

                switch ($tmpTableName){
                    case "predmet":$this->processPredmetEntity($tmpData);break;
                    case "tip_informacije":$this->processTipInformacijeEntity($tmpData);break;
                    case "informacija":$this->processInformacijaEntity($tmpData);break;
//                    case "aktivnost":$this->processAktivnostEntity($tmpData);break;
                }



            }else{

                $answerDivided=explode("-",$answer);
                $predmet=trim(strtolower($answerDivided[0]));
                $stavka=trim(strtolower($answerDivided[1]));

                $krs = DB::table('predmet')->where('naziv',"=",$predmet)->get();
                $predmetID=null;
                 if(count($krs) > 0){
//                     echo "Ne treba dohvatati kljucne reci";
                     $predmetID=$krs[0]->id;

//                     dd($krs);
                 }
                 else{
//                     echo "aaaaaa";
                     $krsLike=DB::table('predmet')->where('naziv',"like",'%'.$predmet.'%')->get();

                     $predmetID=$krsLike[0]->id;

//                     dd($krsLike);



                 }
//                 dd($predmetID);
                 $odgovor=DB::table('predmet_stavka_predmeta')
                     ->join('predmet','predmet_stavka_predmeta.predmetID','=','predmet.id')
                     ->join('stavka_predmeta','predmet_stavka_predmeta.stavka_predmetaID','=','stavka_predmeta.id')->where('predmet.id','=',$predmetID)->where('stavka_predmeta.naziv',"like",'%'.$stavka.'%')->select("predmet_stavka_predmeta.odgovor")->get();
                $this->say('<a target="_blank"href="'.$odgovor[0]->odgovor.'"'.">Rezulat pretage</a>");

            }



        });
    }


    public function run()
    {
        $this->askQuestion();
    }

    public function processPredmetEntity($data){

       $ids=$this->getIdsFromData($data);
        $predmetiSaStavkama=Predmet::with('stavke')->whereIn('id', $ids)->get();

        return $this->bot->startConversation(new BiranjePredmetaConversation($predmetiSaStavkama));

    }
    public function processTipInformacijeEntity($data){
        $ids=$this->getIdsFromData($data);
        $tipoviInformacijaSaInformacijama=TipInformacije::with("informacije")->whereIn('id', $ids)->get();
        return $this->bot->startConversation(new BiranjeTipaInformacijeConversation($tipoviInformacijaSaInformacijama));

    }
public function processInformacijaEntity($data){
    $idInformacije = $data[0]->id;
    return $this->bot->startConversation(new GenerisanjeOdgovoraInformacijConversation($idInformacije));




}
//    public function processAktivnostEntity($data){
//        echo "processAktivnostEntity";
//
//
//    }
    public function getIdsFromData($data){
        $tmp=[];
        foreach ($data as $d)
        {
            array_push($tmp,$d->id);
        }
        return $tmp;
    }
    public function getIdsForCurrentTip($id,$data){
            $tmp=[];
            foreach ($data as $d){
               if($d->tip == $id){
                   $tmp=$d->ids;
               }
            }
            return $tmp;
}
    public function proccessTipovi($tipoviKljucneReci){
        $tipoviKljucneReciDB=TipKljucneReci::whereIn('id', $tipoviKljucneReci)->select("*")->get();
        $tmpTipovi=[];
        foreach ($tipoviKljucneReciDB as $t){
            $tmpObj= new \stdClass();
            $tmpObj->id=$t->id;
            $tmpObj->naziv=$t->naziv;
            array_push($tmpTipovi,$tmpObj);
        }
        return $tmpTipovi;
    }
    public function getTipovi($data){
        $tmp=[];
        foreach ($data as $d){
            array_push($tmp ,$d->tip);
        }
        return $tmp;
    }
    public function processEntities($data){
        $tipoviKljucnihReci=$this->extractTipKljucneReciFromData($data);
        $tmp=[];
        foreach ($tipoviKljucnihReci as $tkr){
            foreach ($data as $d){
                if($d->tipKljucneReciId == $tkr->tip)
                {
                array_push($tkr->ids,$d->entitetId);
                }
            }
        }
//    dd($tipoviKljucnihReci);

        return $tipoviKljucnihReci;
//    dd($tipoviKljucnihReci);
    }

    public function extractTipKljucneReciFromData($data){

        $tmp = [];
        foreach ($data as $d) {
            if(!in_array($d->tipKljucneReciId,$tmp)){

                array_push($tmp,$d->tipKljucneReciId);

            }
        }

        $tmpArr=[];
        foreach ($tmp as $t){
            $obj = new \stdClass();
            $obj->tip=$t;
            $obj->ids=[];
            array_push($tmpArr,$obj);
        }
        return $tmpArr;
    }
public function processAnswer($answer){
        $tmp=[];
        $toBeRemoved=['za'];


        foreach ($answer as $a){
            if(!in_array($a, $toBeRemoved) )
                array_push($tmp,strtolower($a));

        }
        return $tmp;
}
    public function getKljucnaRec($data, $answer)
    {

        $entities=$this->getDifferentEntities($data);

        $entitiesWithKw = $this->getAllKeyWords($data, $entities);
        $arr=[];
        foreach ($entitiesWithKw as $e){

           if(count(array_intersect($e->kws,$answer)) >= count($answer)){
               array_push($arr,$e);
           }

        }


        return $arr;


    }

    public function getDifferentEntities($data){

        $tmp_data=$this->getRelevantData($data,["entitetId","tipKljucneReciId"]);
        $tmpArr=[];
        foreach ($tmp_data as $td){
            if(!in_array($td,$tmpArr))
                array_push($tmpArr,$td);
        }

        return $tmpArr;

    }



    public function getAllKeyWords($data, $entites)
    {
        $tmparr=[];

        foreach ($entites as $e){
            $tmpkw=[];

            foreach ($data as $d){
                if($d->entitetId == $e[0] && $d->tipKljucneReciId == $e[1]){

                    array_push($tmpkw,strtolower($d->naziv));
                }

            }
            $tmpObj = new \stdClass();
            $tmpObj->entitetId=$e[0];
            $tmpObj->tipKljucneReciId=$e[1];
            $tmpObj->kws=$tmpkw;


            array_push($tmparr,$tmpObj);
        }


        return $tmparr;
    }
    public function getRelevantData($data,$columns){
    $tmp_data=[];
        foreach ($data as $d){
            $tmp=[];
            foreach ($columns as $c){

                        array_push($tmp,$d->{$c});
            }
            array_push($tmp_data,$tmp);
        }

    return $tmp_data;
    }



}