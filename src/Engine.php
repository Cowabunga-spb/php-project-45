<?php

namespace BrainGames\Engine;
 
require_once __DIR__ . '/../vendor/autoload.php';
 
use function cli\line;
use function cli\prompt;

function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function playing($name, $result)
{
    [$question, $rightAnswer] = $result;
    line("Question: %s", $question);
    $answer = prompt("Your answer");
    if ($rightAnswer === $answer) {
        line("Correct!");
        return true;
    } elseif ($rightAnswer !== $answer) {
        line('"%s" is wrong answer ;(. Correct answer was "%s"', $answer, $rightAnswer);
        line("Let's try again, %s!", $name);
        return false;
    } else {
        line("Что-то пошло не так!");
    }
}