<?php

namespace Mals17\Dice;

class DiceLogics
{

    private $playersTotal = array();
    private $computerTotal;
    private $sumRound;
    private $round;
    private $serie;
    private $diceValue;

    /**
    * Constructor för spelet. Skapar objekt av klassen DiceHand.
    */
    public function __construct($session_game, $sumRound)
    {
        $this->dice = new DiceHistogram();
        if ($session_game == null) {
            $this->playersTotal = array();
            $this->computerTotal = array();
            $this->sumRound = $sumRound;
            $this->round = "playersRound";
            $this->serie = array();
        } else {
            $this->playersTotal = $session_game[0];
            $this->computerTotal = $session_game[1];
            $this->serie = $session_game[2];
            $this->round = $session_game[3];
            $this->sumRound = $sumRound;
        }
    }

    /**
    * Sparar poängen.
    * @return array roundPoints
    */
    public function saveRound()
    {
        $roundPoints = [];
        array_push($roundPoints, $this->playersTotal);
        array_push($roundPoints, $this->computerTotal);
        array_push($roundPoints, $this->serie);
        array_push($roundPoints, $this->round);

        return $roundPoints;
    }

    /**
    * Slår tärningarna. Kontrollerar om en av tärningarna är ett. samlar poäng.
    * @return array values
    */
    public function roll($throws)
    {
        $dice = new DiceHistogram();
        $values = array();

        for ($i = 0; $i < $throws; $i++) {
            $value = $dice->roll();
            $dices[] = $value;
        }

        if ($this->resetIfOne($dices) > 0) {
            $this->playersTotal[] = 0;
            $this->diceValue = $dices;
            $this->nextRound();
            $this->round = "computersRound";
        } else {
            $this->diceValue = $dices;
            foreach ($dices as $dice) {
                $this->serie[] = $dice;
            }
            $this->sumRound = array_sum($this->serie);
        }
    }

    /**
    * Slår tärningarna för datorn.
    * Om datorn rullar högra än 15 sparar han.
    * Om spelaren har över 80 poäng och datorn mindre än 60 chansar den mer. och sparar på 24.
    */
    public function computerRoll($throws)
    {
        $points = array_sum($this->serie);
        $continue = 15;
        $chance = 24;
        $playersPoints = array_sum($this->playersTotal);
        $computersPoints = array_sum($this->computerTotal);

        if ($points < $continue || $playersPoints > 80 && $computersPoints < 60 && $points < $chance) {
            $dices = array();
            $dice = new DiceHistogram();

            for ($i = 0; $i < $throws; $i++) {
                $value = $dice->roll();
                $dices[] = $value;
            }
            $this->diceValue = $dices;

            if ($this->resetIfOne($dices) > 0) {
                $this->nextRound();
                $this->computerTotal[] = 0;
                $this->round = "playersRound";
            } else {
                foreach ($dices as $dice) {
                    $this->serie[] = $dice;
                }
                $this->sumRound = array_sum($this->serie);
            }
        } else {
            $this->computerTotal[] = array_sum($this->serie);
            $this->nextRound();
            $this->round = "playersRound";
        }
    }

    /**
    * Spelomgångar, kontrollerar om någon vunnit.
    * @return string round
    */
    public function getRound()
    {
        $player = array_sum($this->playersTotal);
        $computer = array_sum($this->computerTotal);
        if ($player > 99 || $computer > 99) {
            $this->round = "end";
        }
        return $this->round;
    }

    /**
    * Sammanlagda poängen.
    * @return array totalPoints
    */
    public function getTotalPoints()
    {
        $totalPoints = array();
        $totalPoints[] = $this->playersTotal;
        $totalPoints[] = $this->computerTotal;

        return $totalPoints;
    }

    /**
    * Poängen för nuvarande spelrunda
    */
    public function getSumRound()
    {
        return $this->sumRound;
    }

    /**
    * Tärningarnas värden
    */
    public function getDiceValue()
    {
        return $this->diceValue;
    }

    /**
    * Spara poängen för nuvarande runda till totalen.
    */
    public function savePoints()
    {
        $this->playersTotal[] = $this->sumRound;
        $this->nextRound();
        $this->round = "computersRound";
    }

    /**
    * Nästa runda, ny runda från 0
    */
    public function nextRound()
    {
        $this->sumRound = 0;
        $this->serie = array();
    }

    /**
    * Kontrollerar om någon av tärningarna har värdet ett.
    * @return int one
    */
    public function resetIfOne($dices)
    {
        $one = 0;
        for ($i = 0; $i < sizeOf($dices); $i++) {
            if ($dices[$i] == 1) {
                $one++;
            }
        }
        return $one;
    }

    /**
    * Skapar histogramet
    */
    public function histogram()
    {
        $dice = new DiceHistogram();
        $dice->rollDices($this->serie);
        return $dice;
    }

    /**
    * Genomsnittspoängen för slaget.
    */
    public function getAverage()
    {
        $average = $this->sumRound / 5;
        return $average;
    }

    /**
    * Spelarens totala genomsnittspoäng.
    * Total poäng / antalet omgångar.
    */
    public function getTotalAverage()
    {
        $numberOfRounds = count($this->playersTotal);
        $playerPoint = array_sum($this->playersTotal);
        if ($numberOfRounds != 0) {
            $totalAverage = round($playerPoint / $numberOfRounds);
            return $totalAverage;
        } else {
            return;
        }
    }
}
