<?php
/**
 * Specific routes for guessing game.
 */

/**
 * Guess number with sessions
 */
$app->router->any(["GET", "POST"], "gissa/session", function () use ($app) {

    $number = $_POST["number"] ?? -1;
    $res = null;
    $guess = null;
    // Startar sessionen
    session_start();
    if (isset($_POST["number"])) {
        $game = $_SESSION["gameSession"];
        $guess = $_POST["guess"];
    } else {
        $game = new \Mals17\Guess\Guess();    //Skapar ett objekt av klassen Guess
        $_SESSION["gameSession"] = $game; //Objektet i sessionen
    }

    // Skickar användarens gissning till funktionen makeGuess() i klassen Guess
    if (isset($_POST["makeGuess"])) {
        $res = $game->makeGuess($guess);
    }

    $data = [
        "title" => "Spela Gissa mitt nummer (Session)",
        "game" => $game,
        "res" => $res,
        "number" => $number,
        "guess" => $guess
    ];

    $app->view->add("guess/session", $data);
    $app->page->render($data);
});

/**
 * Guess number with GET
 */
$app->router->get("gissa/get", function () use ($app) {

    //Variabler för nummret, försök och gissning
    $number = $_GET["number"] ?? -1;
    $tries = $_GET["tries"] ?? 6;
    $guess = $_GET["guess"] ?? null;

    //skapar ett objekt av klassen Guess
    $game = new \Mals17\Guess\Guess($number, $tries);

    $res = null;

    //Skickar en gissning till Guess
    if (isset($_GET["makeGuess"])) {
        $res = $game->makeGuess($guess);
    }

    $data = [
        "title" => "Spela Gissa mitt nummer (Session)",
        "game" => $game,
        "res" => $res,
        "number" => $number,
        "guess" => $guess
    ];

    $app->view->add("guess/get", $data);
    $app->page->render($data);
});

/**
 * Guess number with GET
 */
$app->router->any(["GET", "POST"], "gissa/post", function () use ($app) {

    //Variabler för nummret, försök och gissning
    $number = $_POST["number"] ?? -1;
    $tries = $_POST["tries"] ?? 6;
    $guess = $_POST["guess"] ?? null;

    //skapar ett objekt av klassen Guess
    $game = new \Mals17\Guess\Guess($number, $tries);

    $res = null;

    //Skickar en gissning till Guess
    if (isset($_POST["makeGuess"])) {
        $res = $game->makeGuess($guess);
    }

    $data = [
        "title" => "Spela Gissa mitt nummer (POST)",
        "game" => $game,
        "res" => $res,
        "number" => $number,
        "guess" => $guess
    ];

    $app->view->add("guess/post", $data);
    $app->page->render($data);
});
