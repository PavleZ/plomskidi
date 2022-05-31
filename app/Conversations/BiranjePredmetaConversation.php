<?php

namespace App\Conversations;

use App\Helpers\AnswerHelper;
use App\Helpers\QuestionHelper;
use App\Predmet;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Support\Facades\DB;

class BiranjePredmetaConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public $predmeti=[];
    public $izbraniPredmet;
    public $predmetiBtns=[];
    public $predmetiQ;


    public function __construct($predmeti=null)
    {
        if(isset($predmeti))
            $this->predmeti=$predmeti;

    }

    public function askPredmet(){
        if(count($this->predmeti) == 0){
            $this->predmeti=Predmet::with('stavke')->get();

        }
//        $predmetiBtns=[];

        $question = QuestionHelper::MakeQuestion($this->predmeti,"Molim Vas da izaberete/upisete zeljeni predmet.","Unable to ask question.");

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $predmetId = $answer->getValue();
              return $this->bot->startConversation(new BiranjeStavkiPredmetaConversation($this->predmeti,$predmetId));


            }
            else{
                $odgovor = $answer->getValue();

               $idPredmeta=AnswerHelper::getAnswerByUser($odgovor,$this->predmeti,70);



                if(count($idPredmeta) > 1){
                   $this->predmeti=$idPredmeta;
                   return $this->askPredmet();
               }
               else if(count($idPredmeta) == 0){
                   $this->say("Trazeni predmet ne postoji. Pokusajte ponovo.")->repeat();
               }
               else{
                   $predmetId =$idPredmeta[0]->id;

                   return $this->bot->startConversation(new BiranjeStavkiPredmetaConversation($this->predmeti,$predmetId));
               }
            }
        });
    }

    public function getBtns(){
        return $this->predmetiBtns;
}
    public function run()
    {
        $this->askPredmet();
    }
}
