<?php

namespace mals17\Dice;

use \PHPUnit\Framework\TestCase;

/**
* Testar histogram klassen.
* Kontrollerar om getSerie fungerar och att rätt antal '*' skrivs ut.
*/

class HistogramTest extends TestCase
{
    public function testHistogram()
    {
        $session = [[0, 4, 7, 3, 2], [7, 5, 0, 4, 2], [4, 6, 4, 5, 2], "computersRound"];
        $diceLogic = new DiceLogics($session, 5);
        $histo = $diceLogic->Histogram();

        $histogram = new Histogram();
        $histogram->injectData($histo);
        $exp = 0;

        $serie = $histogram->getSerie();
        $res = count($serie);

        $this->assertGreaterThan($exp, $res);

        $output = $histogram->getAsText();
        $this->assertEquals(5, substr_count($output, "*"));
        $this->assertEquals(6, substr_count($output, "<li>"));
    }
}
