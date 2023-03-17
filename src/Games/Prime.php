<?php

namespace BrainGames\Prime;
 
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Engine.php';

use function cli\line;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\playing;

/**
 * Генерация вопроса и получение ответа для игры Простое число
 *
 * @return void
 */
function generatingForPrime()
{
    $question = rand(0, 100);
    $rightAnswer = 'yes';
    for ($i = 2; $i < $question; $i++) {
        if ($question % $i == 0) {
            $rightAnswer = 'no';
            break;
        }
    }
    $result = [$question, $rightAnswer];
    return $result;
}

/**
 * Процесс игры Простое число
 *
 * @return void
 */
function playPrime()
{
    $name = greeting();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 1; $i < 4; $i++) {
        $result = generatingForPrime();
        if(!playing($name, $result)) {
            $i = 0;
        }
    }
    line("Congratulations, %s!", $name);
}
