<?php

namespace mals17\Dice;

use \PHPUnit\Framework\TestCase;

/**
* Testar klassen DiceLogics.
*/

class DiceLogicsTest extends TestCase
{
    /**
    * Rullar för en spelare.
    * Kontrollerar värdet i getDiceValue.
    */
    public function testRoll()
    {
        $session = [[0], [0], null, "playersRound"];
        $diceLogic = new DiceLogics($session, 0);

        $this->assertInstanceOf("\Mals17\Dice\DiceLogics", $diceLogic);
        $diceLogic->roll(5);
        $res = array_sum($diceLogic->getDiceValue());

        $this->assertGreaterThan(1, $res);
    }

    /**
    * Rullar för datorn.
    * Kontrollerar värdet i getDiceValue.
    */
    public function testcomputerRoll()
    {
        $diceLogic = new DiceLogics(0, 0);

        $this->assertInstanceOf("\Mals17\Dice\DiceLogics", $diceLogic);
        $diceLogic->computerRoll(5);
        $res = array_sum($diceLogic->getDiceValue());

        $this->assertGreaterThan(1, $res);
    }

    /**
    * Testar att spara poängen och turen går över.
    */
    public function testSavePoints()
    {
        $session = [[5, 4, 8, 20], [5, 8, 4, 32], null, "playersRound"];
        $diceLogic = new DiceLogics($session, 5);
        $this->assertInstanceOf("\Mals17\Dice\DiceLogics", $diceLogic);

        $diceLogic->roll(5);
        $diceLogic->savePoints();

        $res = $diceLogic->getRound();
        $exp = "computersRound";

        $this->assertEquals($res, $exp);
    }

    /**
    * Ny spelrunda.
    */
    public function testNewRound()
    {
        $diceLogic = new DiceLogics(0, 0);
        $this->assertInstanceOf("\Mals17\Dice\DiceLogics", $diceLogic);

        $res = $diceLogic->getRound();
        $exp = "playersRound";

        $this->assertEquals($res, $exp);
    }

    /**
    * Testar getTotalPoints.
    */
    public function testPlayersTotal()
    {
        $session = [[0, 8, 7], [7, 5, 0], null, "playersRound"];
        $diceLogic = new DiceLogics($session, 5);
        $this->assertInstanceOf("\Mals17\Dice\DiceLogics", $diceLogic);

        $res = $diceLogic->getTotalPoints();
        $sum = array_sum($res[0]);

        $this->assertEquals(15, $sum);
    }

    /**
    * Testar att vinna.
    */
    public function testWinning()
    {
        $session = [[5, 4, 8, 97], [5, 8, 4, 32], null, "computersRound"];
        $diceLogic = new DiceLogics($session, 5);
        $this->assertInstanceOf("\Mals17\Dice\DiceLogics", $diceLogic);

        $res = $diceLogic->getRound();
        $exp = "end";

        $this->assertEquals($res, $exp);
    }

    /**
    * Testar sumRound.
    */
    public function testSumRound()
    {
        $session = [[5, 4, 8, 97], [5, 8, 4, 32], null, "computersRound"];
        $diceLogic = new DiceLogics($session, 9);
        $this->assertInstanceOf("\Mals17\Dice\DiceLogics", $diceLogic);

        $res = $diceLogic->getSumRound();

        $this->assertEquals(9, $res);
    }

    /**
    * Testar medelvärdet.
    */
    public function testAverage()
    {
        $session = [[5, 4, 8, 97], [5, 8, 4, 32], null, "computersRound"];
        $diceLogic = new DiceLogics($session, 10);
        $this->assertInstanceOf("\Mals17\Dice\DiceLogics", $diceLogic);

        $res = $diceLogic->getAverage();
        $exp = 2;

        $this->assertEquals($exp, $res);
    }
}
