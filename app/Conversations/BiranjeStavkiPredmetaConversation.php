<?php

namespace App\Conversations;

use App\Helpers\AnswerHelper;
use App\Helpers\QuestionHelper;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Support\Facades\DB;

class BiranjeStavkiPredmetaConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */

    public $predmeti;
    public $predmetID;
    public $izbraniPredmet;

    public $stavke=[];
    public $stavkeBtns=[];




    public function __construct($predmeti,$predmetID)
    {
        $this->predmeti=$predmeti;
        $this->predmetID=$predmetID;
    }

    public function askStavkePredmeta()
    {

        foreach ($this->predmeti as $p){
            if($p->id == $this->predmetID){

                $this->izbraniPredmet=$p;
                $stavkeButtons=[];

                if(count($this->stavkeBtns) == 0){
                    foreach($this->izbraniPredmet->stavke as $stavka){
                        array_push($this->stavkeBtns,$stavka);
                        array_push($this->stavke,$stavka);

                    }

                }


                $question = QuestionHelper::MakeQuestion($this->stavkeBtns,"Molim Vas da izaberete/upisete zeljenu stavku.","Unable to ask question.");


                $this->ask($question, function (Answer $answer) {
                    if ($answer->isInteractiveMessageReply()) {
                        $stavkaId=$answer->getValue();
                        return $this->bot->startConversation(new GenerisanjeOdgovoraConversation($this->izbraniPredmet,$this->stavke,$stavkaId));

                    }
                    else{
                        $odgovor = $answer->getValue();
                        $idStavki=AnswerHelper::getAnswerByUser($odgovor,$this->stavke,70);


                        if(count($idStavki) > 1){
                           $this->stavke=$idStavki;


                            return $this->askStavkePredmeta();




                        }
                        else if(count($idStavki) == 0){
                            $this->say("Trazena stavka  ne postoji za odabrani predmet -".$this->izbraniPredmet->naziv. "Pokusajte ponovo.")->repeat();
                        }
                        else{
                            $stavkaId =$idStavki[0]->id;

                            return $this->bot->startConversation(new GenerisanjeOdgovoraConversation($this->izbraniPredmet,$this->stavke,$stavkaId));

                        }




                    }

                });

            }
        }
    }



    public function run()
    {
        $this->askStavkePredmeta();
    }
}
