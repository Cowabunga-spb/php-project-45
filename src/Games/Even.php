<?php

namespace BrainGames\Even;
 
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Engine.php';

use function cli\line;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\playing;

/**
 * Генерация вопроса и получение ответа для игры Четное-нечетное
 *
 * @return void
 */
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

/**
 * Процесс игры Четное-нечетное
 *
 * @return void
 */
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
}
