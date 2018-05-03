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
        <input type="submit" name="save" value="Spara poäng">
    <?php endif ?>
    <?php if ($gameRound == "computersRound") : ?>
    <input id="compRoll" type="submit" name="rollComputer" value="Slå för datorn">
<?php endif ?>
<input type="submit" name="reset" value="Återställ spelet">
</form>
<hr>

<div class="statistics">
    <p class="title">Spelares statistik </p>
    <p><b>Genomsnitt: </b><?= $average ?></p>
    <p><b>Totalt genomsnitt: </b><?= $totalAverage ?></p>
    <hr>
    <p class="title">Histogram</p>
    <pre class="histogram">
        <?= $histogram->getAsText() ?>
    </pre>
</div>
