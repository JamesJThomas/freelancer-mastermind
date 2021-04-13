<?php
declare(strict_types=1);
//checks guesses for validity
class GuessChecker
{
private string $answer;
private array $errors;
function __construct(string $answer)
{
$this->answer = $answer;
$this->errors = [];
}
function checkLength(): void
{
if(strlen($this->answer) != 4)
{
array_push($this->errors, "Your guess must contain 4 characters");
}
}
function checkNumeric(): void
{
$is_numeric = preg_match("/^\d*$/", $this->answer);
if(!$is_numeric)
{
array_push($this->errors, "Your guess must be a number");
}
}
function check(): void
{
$this->checkLength();
$this->checkNumeric();
}
function printErrors(): void
{
if(count($this->errors) > 0)
{
print("Your guess has the following errors:\n");
foreach($this->errors as $error)
{
print("$error\n");
}
}
}
function done(): bool
{
return count($this->errors) === 0;
}
}
?>
