<?php
namespace BrainEven\Even;
 
require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

function playEven()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 1; $i < 4; $i++) {
        $num = rand();
        if ($num % 2 === 0) {
            $rightAnswer = 'yes';
        } else {
            $rightAnswer = 'no';
        }
        line("Question: %s", $num);
        $answer = prompt("Your answer");
        if ($rightAnswer === $answer) {
            line("Correct!");
        } elseif ($rightAnswer !== $answer) {
            line('"%s" is wrong answer ;(. Correct answer was "%s"', $answer, $rightAnswer);
            line("Let's try again, %s!", $name);
            $i = 0;
        } else {
            line("Что-то пошло не так!");
        }
    }
    line("Congratulations, %s!", $name);
}
