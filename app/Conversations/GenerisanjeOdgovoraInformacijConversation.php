<?php

namespace App\Conversations;

use App\Informacija;
use BotMan\BotMan\Messages\Conversations\Conversation;

class GenerisanjeOdgovoraInformacijConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public $informacijaID;
    public function __construct($informacijaID)
    {
        $this->informacijaID=$informacijaID;

    }

    public function generateAnswer(){
        $informacija = Informacija::where("id", $this->informacijaID)->get();
        $odg = $informacija[0]->link;
        $this->say('<a target="_blank"href="' . $odg . '"' . ">Rezulat pretage");
    }
    public function run()
    {
        $this->generateAnswer();
    }
}
