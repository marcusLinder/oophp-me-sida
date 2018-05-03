<?php

namespace mals17\Dice;

use \PHPUnit\Framework\TestCase;

/**
* Testar DiceHand. Kontrollerar så antalet värden i values stämmer
*/

class DiceHandTest extends TestCase
{
    public function testDiceHand()
    {
        $hand = new DiceHand();
        $hand->roll();
        $this->assertInstanceOf("\mals17\Dice\DiceHand", $hand);
        $values = count($hand->values());

        $res = $values;
        $exp = 5;

        $this->assertEquals($res, $exp);

    }
}
