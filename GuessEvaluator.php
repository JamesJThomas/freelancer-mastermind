<?php
//evaluate guesses for wrong, misplaced, and correct answers
declare(strict_types=1);
class GuessEvaluator
{
private string $answer;
private string $secret;
private int $correct;
private int $misplaced;
private int $wrong;
private array $marked;
function __construct(string $answer, string $secret)
{
$this->answer = $answer;
$this->secret = $secret;
$this->correct = 0;
$this->misplaced = 0;
$this->wrong = 0;
$this->marked = [false, false, false, false];
}
function findCorrect(): void
{
for($i = 0; $i < 4; $i++)
{
if($this->answer[$i] === $this->secret[$i])
{
$this->correct++;
$this->marked[$i] = true;
}
}
}
function unmarked(string $answer): array
{
$result = [];
for($i = 0; $i < 4; $i++)
{
if($this->marked[$i])
{
continue;
}
else
{
array_push($result, $answer[$i]);
}
}
return $result;
}
function evaluate(): void
{
$this->findCorrect();
$no_match = $this->unmarked($this->answer);
$remaining_secret = $this->unmarked($this->secret);
for($i = 0; $i < 10; $i++)
{
$ca = count(array_keys($no_match, $i));
$cs = count(array_keys($remaining_secret, $i));
$misplaced = min($ca, $cs);
$wrong = $ca-$misplaced;
$this->misplaced += $misplaced;
$this->wrong += $wrong;
}
}
function giveClues(): void
{
print("correct digits: $this->correct\nmisplaced digits: $this->misplaced\nincorrect digits: $this->wrong\n");
}
function winner(): bool
{
return ($this->correct === 4) && ($this->misplaced === 0) && ($this->wrong === 0);
}
}
?>
