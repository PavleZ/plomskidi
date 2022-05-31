<?php

namespace App\Conversations;

use App\Helpers\AnswerHelper;
use App\Helpers\QuestionHelper;
use App\Informacija;
use App\TipInformacije;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class BiranjeTipaInformacijeConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public $tipoviInformacije;
    public $tipoviInformacijeBtns=[];

    public function __construct($tipoviInformacije=null)
    {
        if(isset($tipoviInformacije))
            $this->tipoviInformacije=$tipoviInformacije;
    }

    public function askTipInformacije(){
        if(!isset($this->tipoviInformacije))
            $this->tipoviInformacije = TipInformacije::with("informacije")->get();




        $question = QuestionHelper::MakeQuestion($this->tipoviInformacije,"Molim Vas da izaberete/upisete tip informacije.","Unable to ask question.");

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $tipInformacijeID = $answer->getValue();
                $this->say($tipInformacijeID);

                return $this->bot->startConversation(new BiranjeInformacijeConversation($this->tipoviInformacije,$tipInformacijeID));



            }
            else{
                $odgovor = $answer->getValue();
                $idTipInformacije= AnswerHelper::getAnswerByUser($odgovor,$this->tipoviInformacije,70);

//                dd($idTipInformacije);
               if(count($idTipInformacije) > 1){

                   $this->tipoviInformacije=$idTipInformacije;

                   return $this->askTipInformacije();




               }
               else if(count($idTipInformacije) == 0){
                   $this->say("Trazeni tip informacije ne postoji. Pokusajte ponovo.")->repeat();
               }
               else{
                   $tipId =$idTipInformacije[0]->id;

                   return $this->bot->startConversation(new BiranjeInformacijeConversation($this->tipoviInformacije,$tipId));

               }

            }
        });
    }



    public function run()
    {
        $this->askTipInformacije();
    }
}
