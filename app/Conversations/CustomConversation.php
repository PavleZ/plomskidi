<?php

namespace App\Conversations;

use App\Helpers\AnswerHelper;
use App\Helpers\QuestionHelper;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class CustomConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public $specificObject;
    public $data;
    public $id;
    public $question;
    public $nextConversation;

    public function __construct($specificObject,$data,$id,$question,Conversation $nextConversation)
    {
        if (isset($specificObject))
            $this->specificObject=$specificObject;
        if (isset($data))
            $this->data=$data;
        if (isset($id))
            $this->id=$id;
        if (isset($question))
            $this->question=$question;

        $this->nextConversation=$nextConversation;

    }
    public  function askQuestion(){



        $question = QuestionHelper::MakeQuestion($this->data,$this->question->questionText,$this->question->fallbackText);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $answerId = $answer->getValue();
                return $this->bot->startConversation(new $this->nextConversation);


            }
            else{
                $answerText = $answer->getValue();

                $idAnswer=AnswerHelper::getAnswerByUser($answerText,$this->data,$this->question->answerPercentage);



                if(count($idAnswer) > 1){
                    $this->data=$idAnswer;
                    return $this->askQuestion();
                }
                else if(count($idAnswer) == 0){
                    $this->say($this->question->noResultText)->repeat();
                }
                else{
                    $idTobePassed =$idAnswer[0]->id;

                    return $this->bot->startConversation($this->nextConversation);
                }
            }
        });



    }



    public function run()
    {
        $this->askQuestion();
    }
}
