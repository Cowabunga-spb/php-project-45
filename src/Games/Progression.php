<?php

namespace BrainGames\Progression;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Engine.php';

use function cli\line;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\playing;

/**
 * Генерация вопроса и получение ответа для игры про арифметическую прогрессию
 *
 * @return void
 */
function generatingForProgression()
{
    $numStart = rand(0, 100);
    $numbers = [];
    for ($i = $numStart; $i <= $numStart + 10; $i++) {
        $numbers[] = $i;
    }
    $hideIndex = rand(0, 9);
    $hideNumber = $numbers[$hideIndex];
    $numbersForQuestion = $numbers;
    $numbersForQuestion[$hideIndex] = '..';
    $question = implode(' ', $numbersForQuestion);
    $rightAnswer = $hideNumber;
    $rightAnswer = (string) $rightAnswer;
    $result = [$question, $rightAnswer];
    return $result;
}

/**
 * Процесс игры про арифметическую прогрессию
 *
 * @return void
 */
function playProgression()
{
    $name = greeting();
    line('What number is missing in the progression?');
    for ($i = 1; $i < 4; $i++) {
        $result = generatingForProgression();
        $output = playing($name, $result);
        if ($output === true && $i === 3) {
            return line("Congratulations, %s!", $name);
        }
        if ($output === false) {
            break;
        }
    }
    
}
