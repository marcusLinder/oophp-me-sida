<?php
    namespace Anax\View;
    
?>

<form class="movieForms" method="post">
    <fieldset>
        <legend>Lägg till film</legend>
        <p><label>Titel<br><input type="text" name="title" value=""/></label></p>
        <p><label>Utgivningsår<br><input type="text" name="year" value=""/></label></p>
        <p><label>Bild<br><input type="text" name="image" value="image/noimage.png"/></label> *</p>
        <p>* Bilderna ska anges i formatet "image/bild.jpg"</p>

        <p><input type="submit" name="add" value="Lägg till filmen"></p>
    </fieldset>
</form>
