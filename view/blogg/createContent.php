<?php
    namespace Anax\View;

?>

<form class="movieForms" method="post">
    <fieldset>
        <legend>Nytt</legend>
        <p><label>Titel<br><input type="text" name="title"></label></p>

        <button type="submit" name="create"><i class="fa fa-plus" aria-hidden="true"></i> Skapa</button>
        <button type="reset"><i class="fas fa-edit" aria-hidden="true"></i> Återställ</button>

    </fieldset>
</form>
