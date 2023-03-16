<?php

namespace BrainGames\Even;
 
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Engine.php';

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\playing;

function generatingForEven()
{
    $question = rand();
    if ($question % 2 === 0) {
        $rightAnswer = 'yes';
    } else {
        $rightAnswer = 'no';
    }
    $result = [$question, $rightAnswer];
    return $result;
}


function playEven()
{
    $name = greeting();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 1; $i < 4; $i++) {
        $result = generatingForEven();
        if(!playing($name, $result)) {
            $i = 0;
        }
    }
    line("Congratulations, %s!", $name);
    
    
    //playing($name,);
    
    
    
    /**
        * line('Answer "yes" if the number is even, otherwise answer "no".');
        * for ($i = 1; $i < 4; $i++) {
        *    $num = rand();
        *    if ($num % 2 === 0) {
        *        $rightAnswer = 'yes';
        *    } else {
        *       $rightAnswer = 'no';
        *    }
        *    line("Question: %s", $num);
        *    $answer = prompt("Your answer");
        *    if ($rightAnswer === $answer) {
        *        line("Correct!");
        *    } elseif ($rightAnswer !== $answer) {
        *        line('"%s" is wrong answer ;(. Correct answer was "%s"', $answer, $rightAnswer);
        *        line("Let's try again, %s!", $name);
        *        $i = 0;
        *    } else {
        *        line("Что-то пошло не так!");
        *    }
        *}
        *line("Congratulations, %s!", $name);
        */

}
