<?php
/**
* Route for dice game
*/

$app->router->any(["GET", "POST"], "dice", function () use ($app) {

    session_name("game");
    session_start();

    $roll = 0;
    $res = [];
    $class = [];

    if (isset($_POST["reset"])) {
        $_SESSION["game"] = null;
        $_SESSION["round"] = null;
    }

    $game = new \Mals17\Dice\DiceLogics($_SESSION["game"], $_SESSION["round"]);

    if (isset($_POST["take"])) {
        $game->savePoints();
    }

    if (isset($_POST["roll"])) {
        $res = $game->roll();
        $roll = 1;
    }

    foreach ($res as $dice) {
        $class[] = "dice-" . $dice;
    }

    if (isset($_POST["rollComputer"])) {
        $res = $game->computerRoll();
    }

    $totalPoints = $game->getTotalPoints();
    $playersTotal = array_sum($totalPoints[0]);
    $computerTotal = array_sum($totalPoints[1]);
    $gameProgress = $game->saveRound();
    $sumRound = $game->getSumRound();
    $gameRound = $game->getRound();

    $_SESSION["game"] = $gameProgress;
    $_SESSION["round"] = $sumRound;

    $data = [
        "title" => "Tärningsspel - först till 100",
        "totalPoints" => $totalPoints,
        "res" => $res,
        "roll" => $roll,
        "class" => $class,
        "sumRound" => $sumRound,
        "playersTotal" => $playersTotal,
        "computerTotal" => $computerTotal,
        "gameRound" => $gameRound
    ];

    $app->view->add("dice/diceGame", $data);
    $app->page->render($data);
});
