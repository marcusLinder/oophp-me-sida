<?php
    namespace Anax\View;

?>

<form class="movieForms" method="get">
    <fieldset>
        <legend>Sök filmer baserat på utvigningsår</legend>
        <input type="hidden" name="route" value="searchYear">
        <p><label>Utgiven mellan: <input type="number" name="year1" value="<?= $year1 ?: 1900 ?>" min="1900" max="2100"/>
            <input type="number" name="year2" value="<?= $year2 ?: 2100 ?>" min="1900" max="2100"/>
        </p>
        <p><input type="submit" name="search" value="Sök"></p>

        <p><a class="button" href="?">Visa alla</a></p>
    </fieldset>
</form>
