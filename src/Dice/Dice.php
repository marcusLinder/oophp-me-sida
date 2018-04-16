<?php
namespace Mals17\Dice;

class Dice
{

    private $sides;
    private $throws = array();
    private $lastRoll;

    /**
    * Constructor för att skapa en tärning
    * @param int $sides Tärningens sidor
    */
    public function __construct(int $sides)
    {
        $this->sides = $sides;
    }

    /**
    * Slår tärningarna.
    */
    public function roll($times)
    {
        $this->throws = array();
        for ($i = 0; $i <= $times; $i++) {
            $this->lastRoll = rand(1, $this->sides);
            $this->throws[] = $this->lastRoll;
        }
        return $this->lastRoll;
    }

    /*
    * Returnerar array med de slagna tärningarna
    */
    public function getLastRoll()
    {
        return $this->throws;
    }
}
