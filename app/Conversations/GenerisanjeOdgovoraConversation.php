<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Support\Facades\DB;

class GenerisanjeOdgovoraConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */

    public $stavke;
    public $stavkaID;
    public  $izabranaStavka;
    public $izabraniPredmet;
    public function __construct($izabraniPredmet,$stavke,$stavkaID)
    {
        $this->stavke=$stavke;
        $this->stavkaID=$stavkaID;
        $this->izabraniPredmet=$izabraniPredmet;
    }

    public function generateAnswer(){
        foreach ($this->stavke as $stavka){

            if($stavka->id == $this->stavkaID){
                $this->izabranaStavka=$stavka;
                $odgovorObj=DB::table("predmet_stavka_predmeta")->where("predmetID",'=',$this->izabraniPredmet->id)->where("stavka_predmetaID","=",$this->izabranaStavka->id)->get();
                $this->say('<a target="_blank"href="'.$odgovorObj[0]->odgovor.'"'.">Rezulat pretage");
            }

        }


    }

    public function run()
    {
        $this->generateAnswer();
    }
}
