<?php

namespace Mals17\Dice;

class DiceLogics
{

    private $playersTotal = array();
    private $computerTotal;
    private $sumRound;
    private $round;

    /**
    * Constructor för spelet. Skapar objekt av klassen DiceHand.
    */
    public function __construct($session_game, $sumRound)
    {
        $this->dice = new DiceHand();
        if ($session_game == null) {
            $this->playersTotal = array();
            $this->computerTotal = array();
            $this->sumRound = $sumRound;
            $this->round = "playersRound";
        } else {
            $this->playersTotal = $session_game[0];
            $this->computerTotal = $session_game[1];
            $this->sumRound = $sumRound;
            $this->round = "playersRound";
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

        return $roundPoints;
    }

    /**
    * Slår tärningarna. Kontrollerar om en av tärningarna är ett. samlar poäng.
    * @return array values
    */
    public function roll()
    {
        $dice = new DiceHand();
        $values = $dice->roll();
        if ($this->resetIfOne($values) > 0) {
            $this->playersTotal[] = 0;
            $this->nextRound();
            $this->round = "computersRound";
        } else {
            $this->sumRound = $this->sumRound + array_sum($values);
            $this->round = "playersRound";
        }
        return $values;
    }

    /**
    * Slår tärningarna för datorn
    */
    public function computerRoll()
    {
        $count = 0;
        $points = 0;
        $one = 0;

        while ($one == 0 && $count < 2) {
            $dices = new DiceHand();
            $values = $dices->roll();
            if ($this->resetIfOne($values) > 0) {
                $one = 1;
                $points = 0;
            } else {
                $points = $points + array_sum($values);
            }
            $count++;
        }
        $this->computerTotal[] = $points;
        $this->round = "playersRound";
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
}
