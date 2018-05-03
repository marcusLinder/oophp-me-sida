<?php

namespace Mals17\Dice;

/**
* Interface för histogram
*/
interface DiceHistogramInterface
{

    /**
    * Hämtar serien.
    * @return array med talen.
    */
    public function getHistogramSerie();

    /**
    * Hämtar minsta värdet.
    * @return int Minsta värdet.
    */
    public function getHistogramMin();

    /**
    * Hämtar högsta värdet.
    * @return int Högsta värdet.
    */
    public function getHistogramMax();
}
