<?php

namespace App\Conversations;

use App\Helpers\AnswerHelper;
use App\Helpers\QuestionHelper;
use App\Informacija;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class BiranjeInformacijeConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public $tipInformacijeID;
    public $tipoviInformacije;
    public $informacijeBtns=[];
    public $informacije=[];

    public function __construct($tipoviInformacije,$tipInformacijeID)
    {
        $this->tipoviInformacije=$tipoviInformacije;
        $this->tipInformacijeID=$tipInformacijeID;
    }

    public function askInformacija(){


            foreach ($this->tipoviInformacije as $ti) {
                if ($ti->id == $this->tipInformacijeID) {
                    foreach ($ti->informacije as $i) {
                        array_push($this->informacije,$i);

                    }
                }



        }


        $question = QuestionHelper::MakeQuestion($this->informacije,"Molim Vas da izaberete/upisete  zelejnu informaciju.","Unable to ask question.");

        $this->ask($question, function (Answer $answer) {

            if ($answer->isInteractiveMessageReply()) {

                $informacijaID = $answer->getValue();

                return $this->bot->startConversation(new GenerisanjeOdgovoraInformacijConversation($informacijaID));


            }
            else{
                $odgovor = $answer->getValue();
                $idInformacije=AnswerHelper::getAnswerByUser($odgovor,$this->informacije,70);

                if(count($idInformacije) > 1){

                    $this->informacijeBtns=[];
                  $this->informacije=$idInformacije;


                    return $this->askInformacija();




                }
                else if(count($idInformacije) == 0){
                    $this->say("Trazeni tip informacije ne postoji. Pokusajte ponovo.")->repeat();
                }
                else{
                    $infoId =$idInformacije[0]->id;

                    return $this->bot->startConversation(new GenerisanjeOdgovoraInformacijConversation($infoId));

                }
            }

        });

    }

    public function run()
    {
        $this->askInformacija();

    }
}
