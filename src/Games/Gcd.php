<?php

namespace BrainGames\Gcd;
 
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Engine.php';

use function cli\line;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\playing;

function generatingForGcd()
{
    $num1 = rand(0, 100);
    $num2 = rand(0, 100);
    $question = "{$num1} {$num2}";
    // $rightAnswer = gmp_gcd($num1, $num2);
    // Не работает встроенная gmp_gcd, заменяю:
    for ($i = max($num1, $num2); $i > 0; $i--) {
        if ($num1 % $i == 0 && $num2 % $i == 0) {
            $rightAnswer = $i;
            break;
        }
    }
    $rightAnswer = (string) $rightAnswer;
    $result = [$question, $rightAnswer];
    return $result;
}

function playGcd()
{
    $name = greeting();
    line('Find the greatest common divisor of given numbers.');
    for ($i = 1; $i < 4; $i++) {
        $result = generatingForGcd();
        if(!playing($name, $result)) {
            $i = 0;
        }
    }
    line("Congratulations, %s!", $name);
}

