<?php
    namespace Anax\View;

?>

<form class="movieForms" method="post">
    <fieldset>
        <legen>Uppdatera innehållet</legend>
        <input type="hidden" name="id" value="<?= esc($content->id) ?>"/>
        <p><label>Titel<br><input type="text" name="title" value="<?= esc($content->title) ?>"/></label></p>
        <p><label>Path<br><input type="text" name="path" value="<?= esc($content->path) ?>"/></label></p>
        <p><label>Slug<br><input type="text" name="slug" value="<?= esc($content->slug) ?>"/></label></p>
        <p><label>Text<br><textarea rows="10" cols="70" name="data"><?= esc($content->data) ?></textarea></p>
        <p><label>Type<br><input type="text" name="type" value="<?= esc($content->type) ?>"/></label></p>
        <p><label>Filter<br><input type="text" name="filter" value="<?= esc($content->filter) ?>"/></label></p>
        <p><label>Publicera<br><input type="text" name="publish" value="<?= esc($content->published) ?>"/></label></p>

        <button type="submit" name="update"><i class="fas fa-edit" aria-hidden="true"></i> Uppdatera</button>
        <button type="submit" name="remove"><i class="fas fa-trash-alt" aria-hidden="true"></i> Ta bort inlägget</button>
        <button type="reset"><i class="fas fa-edit" aria-hidden="true"></i> Återställ</button>
    </fieldset>
</form>
