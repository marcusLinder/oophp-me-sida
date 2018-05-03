<?php
/**
* Route for dice game
*/

$app->router->any(["GET", "POST"], "dice", function () use ($app) {
    $app->session();
    $throw = 0;
    $res = [];
    $class = [];

    if ($app->request->getPost("reset") !== null) {
        $app->session->set("game", null);
        $app->session->set("round", 0);
    }

    if ($app->session->get("round") == null) {
        $app->session->set("round", 0);
    }

    $game = new \Mals17\Dice\DiceLogics($app->session->get("game"), $app->session->get("round"));
    if ($app->request->getPost("roll") !== null) {
        $game->roll(5);
        $throw = 1;
    }

    if ($app->request->getPost("save") !== null) {
        $game->savePoints();
    }
    if ($app->request->getPost("rollComputer") !== null) {
        $res = $game->computerRoll(5);
    }

    $histogram = new \Mals17\Dice\Histogram();
    $dice = $game->histogram();
    $histogram->injectData($dice);
    $diceSerie = $game->getDiceValue();
    $app->session->set("game", $game->saveRound());
    $app->session->set("round", $game->getSumRound());

    if (!empty($diceSerie)) {
        foreach ($diceSerie as $dice) {
            $class[] = "dice-" . $dice;
        }
    }

    $totalPoints = $game->getTotalPoints();
    $playersTotal = array_sum($totalPoints[0]);
    $computerTotal = array_sum($totalPoints[1]);
    $gameProgress = $game->saveRound();
    $sumRound = $game->getSumRound();
    $gameRound = $game->getRound();
    $average = $game->getAverage();
    $totalAverage = $game->getTotalAverage();

    $data = [
        "title" => "Tärningsspel - först till 100",
        "totalPoints" => $totalPoints,
        "roll" => $throw,
        "class" => $class,
        "sumRound" => $sumRound,
        "playersTotal" => $playersTotal,
        "computerTotal" => $computerTotal,
        "gameRound" => $gameRound,
        "histogram" => $histogram,
        "average" => $average,
        "totalAverage" => $totalAverage
    ];

    $app->view->add("dice/diceGame", $data);
    $app->page->render($data);
});
