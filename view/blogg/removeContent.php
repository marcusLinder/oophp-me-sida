<?php
    namespace Anax\View;

?>

<form class="movieForms" method="post">
    <fieldset>
        <legen>Uppdatera innehållet</legend>
        <input type="hidden" name="id" value="<?= esc($content->id) ?>"/>
        <p><label>Titel<br><input type="text" name="title" value="<?= esc($content->title) ?>" disabled/></label></p>
        <p><label>Path<br><input type="text" name="path" value="<?= esc($content->path) ?>" disabled/></label></p>
        <p><label>Slug<br><input type="text" name="slug" value="<?= esc($content->slug) ?>" disabled/></label></p>
        <p><label>Text<br><textarea rows="10" cols="70" name="data" disabled><?= esc($content->data) ?></textarea></p>
        <p><label>Type<br><input type="text" name="type" value="<?= esc($content->type) ?>" disabled/></label></p>
        <p><label>Filter<br><input type="text" name="filter" value="<?= esc($content->filter) ?>" disabled/></label></p>
        <p><label>Publicera<br><input type="text" name="publish" value="<?= esc($content->published) ?>" disabled/></label></p>

        <button type="submit" name="remove"><i class="fa fa-floppy-o" aria-hidden="true"></i> Ta bort</button>
    </fieldset>
</form>
