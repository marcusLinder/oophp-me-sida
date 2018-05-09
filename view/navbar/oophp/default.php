<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>
<navbar>
    <a href="<?= url("") ?>">Hem</a>
    <a href="<?= url("redovisning") ?>">Redovisning</a>
    <a href="<?= url("om") ?>">Om</a>
    <a href="<?= url("gissa") ?>">Gissa</a>
    <a href="<?= url("dice") ?>">Tärningsspel</a>
    <a href="<?= url("movie/allMovies") ?>">Filmdatabas</a>
    <a href="<?= url("textfilter/textfilter") ?>">Test textfilter</a>
    <a href="<?= url("lek") ?>">Lek</a>
</navbar>
