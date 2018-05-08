<?php
namespace Anax\View;

?>

<form class="movieForms" method="get">
    <fieldset>
        <legend>Sök efter titel</legend>
            <input type="hidden" name="route" value="searchTitel">
            <p><label>Titel (använd % som wildcard):
                <input type="search" name="titleSearch" value="<?= esc($searchTitle) ?>"/></label></p>
                <p><input type="submit" name="search" value="Sök"></p>
                <p><a class="button" href="?">Vissa alla</a></p>
    </fieldset>
</form>
