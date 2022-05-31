<?php

namespace App\Helpers;

use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;



class QuestionHelper
{

    public static function MakeQuestion($data,$questionText,$fallbackText){
        $btns=self::MakeButtons($data);
       return Question::create($questionText)->fallback($fallbackText)->addButtons($btns);

    }
    public static function MakeButtons($data){
        $tmpArr=[];
    foreach ($data as $d){
        array_push($tmpArr,Button::create($d->naziv)->value($d->id));
    }
    return $tmpArr;

    }

}