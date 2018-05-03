<?php

namespace Mals17\Dice;

class DiceHistogram extends Dice implements DiceHistogramInterface
{
    use DiceHistogramTrait;

    /**
    * Högsta värdet i histogramet.
    * @return int Högsta värdet.
    */
    public function getHistogramMax()
    {
        return $this->sides;
    }

    /**
    * Slår tärningarna
    */
    public function rollDices($serie)
    {
        $this->sides = 6;
        $this->serie = $serie;
    }
}
