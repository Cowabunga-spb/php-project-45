<?php
namespace BrainGames\Cli;
 
require_once __DIR__ . '/../vendor/autoload.php';
 
use function cli\line;
use function cli\prompt;

/**
 * Greeting
 *
 * @param bool ()
 */
function greeting()
{
    line('Welcome to the Brain Game!');
            $name = prompt('May I have your name?');
            line("Hello, %s!", $name);
}
