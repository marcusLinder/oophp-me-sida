<?php

namespace Mals17\Dice;

class Dice
{

    private $sides;
    protected $throws = array();
    private $lastRoll = array();

    /**
    * Constructor för att skapa en tärning
    * @param int $sides Tärningens sidor
    */
    public function __construct()
    {
        $this->sides = 6;
    }

    /**
    * Slår tärningarna.
    */
    public function roll()
    {
        $this->throws = rand(1, 6);
        return $this->throws;
    }

    /*
    * Returnerar array med de slagna tärningarna
    */
    public function getLastRoll()
    {
        return $this->throws;
    }
}
