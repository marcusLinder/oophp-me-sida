<?php

namespace mals17\Dice;

use \PHPUnit\Framework\TestCase;

/**
* Testar Dice klassen.
* Kontrollerar så värdena i roll och getLastRoll är samma.
*/

class DiceTest extends TestCase
{
    public function testDice()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\Mals17\Dice\Dice", $dice);

        $res = $dice->roll();
        $exp = $dice->getLastRoll();

        $this->assertEquals($exp, $res);
    }
}
