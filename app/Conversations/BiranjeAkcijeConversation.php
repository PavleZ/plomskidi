<?php

namespace App\Conversations;

use App\Helpers\AnswerHelper;
use App\Helpers\QuestionHelper;
use App\Informacija;
use App\TipInformacije;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use App\Aktivnost;
use App\Predmet;

use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;

class BiranjeAkcijeConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public $predmeti;
    public $izbraniPredmet;
    public $izabranaStavka;
    public $tipoviInformacije;
    public $aktivnost=[];
        public $btns=[];
        public $aktivnosti=[];
    public function askAkcija()
    {
        $this->aktivnosti=Aktivnost::all();

        $question = QuestionHelper::MakeQuestion($this->aktivnosti,"Dobrodosli! Molim Vas da izaberete / upisete zeljenu aktivnost.","Unable to ask question.");

        return $this->ask($question, function (Answer $answer) {

            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() == 1) {
                    return $this->bot->startConversation(new BiranjePredmetaConversation());

                } else {
                   return $this->bot->startConversation(new BiranjeTipaInformacijeConversation());
                }
            }
            else{


                $odgovor = $answer->getValue();

                AnswerHelper::answerHandler($odgovor);
                $aktivnostIds=AnswerHelper::getAnswerByUser($odgovor,$this->aktivnosti,70);

                if(count($aktivnostIds) > 1){

                    $this->btns=[];
                        $this->aktivnosti=$aktivnostIds;

                    return $this->askAkcija();

                }
                else if(count($aktivnostIds) == 0){
                    $this->say("Trazena akcija ne postoji. Pokusajte ponovo.")->repeat();
                }
                else{
                    $akcijaId =$aktivnostIds[0]->id;
                    switch ($akcijaId){
                        case 1:
                            return $this->bot->startConversation(new BiranjePredmetaConversation());break;
                        case 2:
                            return $this->bot->startConversation(new BiranjeTipaInformacijeConversation());break;

                    }

                }

            }
        });
    }



    public function run()
    {
    
        $this->askAkcija();
     
    }
}
