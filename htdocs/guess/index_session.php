<?php
require "config.php";
require "autoload.php";

$title = "Guess a number (Session)";

$number = $_POST["number"] ?? -1;

// Startar sessionen
session_start();
if (isset($_POST["number"])) {
    $game = $_SESSION["gameSession"];
    $guess = $_POST["guess"];
} else {
    $game = new Guess();    //Skapar ett objekt av klassen Guess
    $_SESSION["gameSession"] = $game; //Objektet i sessionen
}

// Skickar användarens gissning till funktionen makeGuess() i klassen Guess
if (isset($_POST["makeGuess"])) {
    $res = $game->makeGuess($guess);
}


?>
<!doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
<h1> <?= $title ?> </h1>
<p>Guess a number between 1 and 100, you have <?= $game->tries() ?> tries left</p>

<form method="POST">
    <input type="hidden" name="number" value="<?= $game->number() ?>">
    <input type="hidden" name="tries" value="<?= $game->tries() ?>">
    <input type="text" name="guess">
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
if (isset($_POST["lookAtCheat"])) : ?>
    <p>Cheat: <b><?= $game->number() ?></b></p>
<?php endif; ?>
