<?php

namespace Mals17\Dice;

/**
* Tärningshand
*/
class DiceHand
{

    private $dices;
    private $values;

    /**
    * Constructor för en hand med fem tärningar.
    * @param int dices Antal tärningar som skapas
    */
    public function __construct(int $dices = 5)
    {
        $this->dices = [];
        $this->values = [];

        for ($i = 0; $i < $dices; $i++) {
            $this->dices[] = new Dice();
            $this->values[] = null;
        }
    }

    /**
    * Slår tärningarna.
    *
    * @return array med slagen
    */
    public function roll()
    {
        for ($i = 0; $i < 5; $i++) {
            $this->values[$i] = $this->dices[$i]->roll($i);
        }
        return $this->values;
    }

    /**
    * Returnerar slagen
    */
    public function values()
    {
        return $this->values;
    }
}
