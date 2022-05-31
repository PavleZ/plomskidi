<?php

namespace App\Helpers;

class AnswerHelper
{

    public  static function getAnswerByUser($answer,$data,$percent){
        $answer=strtolower($answer);
        $ids=[];

        foreach ($data as $d) {
            $odg=implode(explode(" ",$answer));
            $perc=0;
            $sim = similar_text(strtolower($d->naziv), strtolower($odg), $perc);

            $tmpObj= new \stdClass();
            $tmpObj->id=$d->id;
            $tmpObj->naziv=$d->naziv;
            if($perc >= $percent)
                array_push($ids,$tmpObj);

        }

        return $ids;
    }
    public  static function answerHandler($answer,$model=null){

     $answer= strtolower($answer);


//        if($model == null){
//
//        }


    }





}