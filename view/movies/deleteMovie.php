<?php
    namespace Anax\View;
    
?>

<form class="movieForms" method="post">
    <fieldset>
        <legend>Ta bort filmen</legend>
        <input type="hidden" name="id" value="<?= $movie->id ?>"/>
        <p><label>Titel<br><input type="text" name="title" value="<?= $movie->title ?>" disabled/></label></p>
        <p><label>Utgivningsår<br><input type="text" name="year" value="<?= $movie->year ?>" disabled/></label></p>
        <p><label>Bild<br><input type="text" name="image" value="<?= $movie->image ?>" disabled/></label></p>

        <p><input type="submit" name="delete" value="Ta bort filmen"></p>
    </fieldset>
</form>
