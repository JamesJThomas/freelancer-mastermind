<?php
declare(strict_types=1);
include("GuessChecker.php");
include("GuessEvaluator.php");
function play_game(): void
{
$secret = get_secret();
for($i = 0; $i < 10; $i++)
{
$attempt = $i+1;
$done = false;
while(!$done)
{
print("Enter guess number $attempt:");
$guess = trim(fgets(STDIN));
$gc = new GuessChecker($guess);
$gc->check();
$gc->printErrors();
$done = $gc->done();
}
$ge = new GuessEvaluator($guess, $secret);
$ge->evaluate();
$ge->giveClues();
if($ge->winner())
{
break;
}
}
if($i === 10)
{
print("Sorry, you have exhausted all of your attempts. The secret number was $secret.\n");
}
else
{
print("You win!\n");
}
}
function get_secret(): string
{
$digits = range(0,9);
shuffle($digits);
$result = [];
for($i = 0; $i < 4; $i++)
{
array_push($result, $digits[$i]);
}
return implode("", $result);
}
function should_play(): bool
{
while(true)
{
print("Do you want to play again? (y/n)\n");
$answer = trim(fgets(STDIN));
switch(strtolower($answer))
{
case "y":
return true;
case "n":
return false;
default:
print("Expected one of: Y, y, N, or n; got $answer");
break;
}
}
}
function main(): void
{
print("Welcome to mastermind, written in the php programming language.\nI will pick 4 secret digits and you will have 10 attempts to guess them. After each attempt, I will tell you how many digits are correct, misplaced, or incorrect. If you don't get the answer after the 10th attempt, I will tell you the secret number\n");
$should_play = true;
while($should_play)
{
play_game();
$should_play = should_play();
}
}
main();
?>
