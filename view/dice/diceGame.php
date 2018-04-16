<?php

namespace Anax\View;

/**
* Render view
*/
?>

<h1>Tärningsspel</h1>
<p>Alla tärningar med ögon 2-6 summeras och adderas till totalen för nuvarande spelrunda. Om spelaren kastar en etta så
    avbryts spelrundan och alla poäng som samlats in i nuvarande runda förloras, turen går över till nästa spelare.
Spelaren kan välja att kasta flera gånger eller spara poängen.</p>

<div class="player">
    <p class="title">Spelare </p>
    <p>Omgångar: <?php foreach ($totalPoints[0] as $point) :?>
        <?= $point ?>,
    <?php endforeach; ?></p>
    <p>Totalt: <b><?= $playersTotal ?>
        <?= ($playersTotal > 99 ) ? 'Vinnare ' : ''; ?></b></p>
</div>

<div class="computer">
    <p class="title">Dator AI </p>
    <p>Omgångar: <?php foreach ($totalPoints[1] as $point) : ?>
        <?= $point ?>,
    <?php endforeach; ?></p>
    <p>Totalt: <b><?= $computerTotal ?>
    <?= ($computerTotal > 99) ? 'Vinnare ' : ''; ?></b></p>
</div>
<div class="game">
    <hr>
    <p>Poäng denna runda: <?= $sumRound ?></p>

    <?php if ($roll == 1) : ?>
        <p><b>Tärningar: </b> <?php foreach ($res as $dice) :?>
            <?= $dice ?> ,
        <?php endforeach; ?>
    </p>
    <?php endif; ?>

    <p>
        <?php foreach ($class as $value) : ?>
            <i class="dice-sprite <?= $value ?>"></i>
        <?php endforeach; ?>
    </p>
    </div>
<form class="diceForm" method="POST">
    <input type="hidden" value="<?= $sumRound ?>">
    <?php if ($gameRound == 'playersRound') : ?>
        <input type="submit" name="roll" value="Slå">
        <input type="submit" name="take" value="Spara poäng">
    <?php endif ?>
    <?php if ($gameRound == "computersRound") : ?>
    <input type="submit" name="rollComputer" value="Slå för datorn">
<?php endif ?>
<input type="submit" name="reset" value="Återställ spelet">
</form>
<hr>
