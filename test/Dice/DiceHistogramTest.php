<?php

namespace mals17\Dice;

use \PHPUnit\Framework\TestCase;

/**
* Testar DiceHistogram.
*/

class DiceHistogramTest extends TestCase
{
    /**
    * Kontrollerar om getHistogramMax returnerar rätt värde.
    */
    public function testMax()
    {
        $diceHistogram = new DiceHistogram();
        $this->assertInstanceOf("\mals17\Dice\DiceHistogram", $diceHistogram);

        $res = $diceHistogram->getHistogramMax();
        $exp = 6;

        $this->assertEquals($exp, $res);
    }

    /**
    * Kontrollerar om getHistogramSerie returnerar rätt antal värden.
    */
    public function testSerie()
    {
        $diceHistogram = new DiceHistogram();
        $this->assertInstanceOf("\mals17\Dice\DiceHistogram", $diceHistogram);
        $serie = [3, 4 ,6 , 5];
        $diceHistogram->rollDices($serie);
        $HistogramSerie = $diceHistogram->getHistogramSerie();

        $res = count($HistogramSerie);
        $exp = 4;

        $this->assertEquals($exp, $res);
    }

    /**
    * Kontrollerar om getHistogramMin returnerar rätt värde.
    */
    public function testMin()
    {
        $diceHistogram = new DiceHistogram();
        $this->assertInstanceOf("\mals17\Dice\DiceHistogram", $diceHistogram);

        $res = $diceHistogram->getHistogramMin();
        $exp = 1;

        $this->assertEquals($res, $exp);
    }
}
