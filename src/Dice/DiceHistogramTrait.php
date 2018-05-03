<?php

namespace Mals17\Dice;

trait DiceHistogramTrait
{
    /**
    * @var array @serie Lagrar talen.
    */
    private $serie = [];

    /**
    * @return array med talen.
    */
    public function getHistogramSerie()
    {
        return $this->serie;
    }

    /**
    * Hämtar lägsta värdet för histogramet.
    * @return int Lägsta värdet.
    */
    public function getHistogramMin()
    {
        return 1;
    }

    /**
    * Hämtar högsta värdet för histogramet.
    * @return int Högsta värdet.
    */
    public function getHistogramMax()
    {
        return max($this->serie);
    }
}
