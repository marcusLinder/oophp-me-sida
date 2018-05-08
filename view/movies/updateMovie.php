<?php
    namespace Anax\View;
    
?>

<form class="movieForms" method="post">
    <fieldset>
        <legend>Uppdatera filmen</legend>
        <input type="hidden" name="id" value="<?= $movie->id ?>"/>
        <p><label>Titel<br><input type="text" name="title" value="<?= $movie->title ?>"/></label></p>
        <p><label>Utgivningsår<br><input type="text" name="year" value="<?= $movie->year ?>"/></label></p>
        <p><label>Bild<br><input type="text" name="image" value="<?= $movie->image ?>"/></label> *</p>
        <p>* Bilderna ska anges i formatet "image/bild.jpg"</p>

        <p><input type="submit" name="update" value="Uppdatera filmen"></p>
    </fieldset>
</form>
