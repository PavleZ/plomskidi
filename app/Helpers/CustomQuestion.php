<?php

namespace App\Helpers;

class CustomQuestion
{
    private  $questionText;
    private  $fallbackText;
    private  $answerPercentage;



    public function __construct($questionText,$fallbackText,$answerPercentage)
    {
      $this->questionText=$questionText;
      $this->fallbackText=$fallbackText;
      $this->answerPercentage=$answerPercentage;


    }

    public function getQuestionText()
    {
        return $this->questionText;
    }


    public function getAnswerPercentage()
    {
        return $this->answerPercentage;
    }


    public function getFallbackText()
    {
        return $this->fallbackText;
    }


}