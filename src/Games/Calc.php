<?php

namespace BrainGames\Calc;
 
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Engine.php';

use function cli\line;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\playing;

/**
 * Генерация вопроса и получение ответа для игры Калькулятор
 *
 * @return void
 */
function generatingForCalc()
{
    $operations = ['+', '-', '*'];
    $operationsIndex = rand(0, 2);
    $operation = $operations[$operationsIndex];
    $num1 = rand(0, 100);
    $num2 = rand(0, 100);
    $question = "{$num1} {$operation} {$num2}";
    switch ($operation) {
        case '+':
            $rightAnswer = $num1 + $num2;
            break;
        case '-':
            $rightAnswer = $num1 - $num2;
            break;
        case '*':
            $rightAnswer = $num1 * $num2;  
            break;  
    }
    $rightAnswer = (string) $rightAnswer;
    $result = [$question, $rightAnswer];
    return $result;
}

/**
 * Процесс игры Калькулятор
 *
 * @return void
 */
function playCalc()
{
    $name = greeting();
    line('What is the result of the expression?');
    for ($i = 1; $i < 4; $i++) {
        $result = generatingForCalc();
        $output = playing($name, $result);
        if ($output === true && $i === 3) {
            return line("Congratulations, %s!", $name);
        }
        if ($output === false) {
            break;
        }
    }
}