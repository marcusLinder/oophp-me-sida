<?php

namespace Mals17\Guess;

require "config.php";
require "autoload.php";

$title = "Guess a number (GET)";

//Variabler för nummret, försök och gissning
$number = $_GET["number"] ?? -1;
$tries = $_GET["tries"] ?? 6;
$guess = $_GET["guess"] ?? null;

//skapar ett objekt av klassen Guess
$game = new Guess($number, $tries);

$res = null;

//Skickar en gissning till Guess
if (isset($_GET["makeGuess"])) {
    $res = $game->makeGuess($guess);
}
?>

<!doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
<h1> <?= $title ?> </h1>
<p>Guess a number between 1 and 100, you have <?= $game->tries() ?> tries left</p>

<form method="GET">
    <input type="hidden" name="number" value="<?= $game->number() ?>">
    <input type="hidden" name="tries" value="<?= $game->tries() ?>">
    <input type="text" name="guess" value="<?= $guess ?>">
    <input type="submit" name="makeGuess" value="Make a guess"<?= $game->tries() == 0 ? "disabled" : null ?>>
    <input type="submit" name="lookAtCheat" value="Cheat">
    <input type="button" value="Reset" onclick="window.location.href='?reset'" />
</form>

<?php //Skriver ut information om gissningen är för låg/hög eller korrekt
if (isset($res)) : ?>
    <?php if ($guess > $number) : ?>
        <p>Your guess <?= $guess ?> <b>is to high..</b></p>
    <?php endif; ?>
    <?php if ($guess < $number) : ?>
        <p>Your guess <?= $guess ?> <b>is to low..</b></p>
    <?php endif; ?>
    <?php if ($guess == $number) : ?>
        <p>Your guess <?= $guess ?> <b>is correct!!</b></p>
    <?php endif; ?>
    <?php endif; ?>

<?php //Anropar funktionen number och skriver ut talet om användaren fuskar
if (isset($_GET["lookAtCheat"])) : ?>
        <p>Cheat: <b><?= $game->number() ?></b></p>
    <?php endif; ?>
