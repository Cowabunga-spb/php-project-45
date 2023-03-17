<?php

namespace BrainGames\Engine;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

/**
 * Приветствие
 *
 * Приветстует и сохраняет имя
 *
 * @return string Имя пользователя
 */
function greeting()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

/**
 * Функция одного этапа игры
 *
 * Принимает на вход имя пользователя, вопрос и верный ответ. Общается с пользователем, задает вопрос и принимает ответ. Сравнивает ответ пользователя с верным ответом.
 * Возвращает true, если ответ верный и false, если неправильный.
 *
 * @param  string $name
 * @param  array $result
 *
 * @return bool итог раунда
 */
function playing(string $name, array $result)
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
