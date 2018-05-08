<?php

namespace Anax\View;

if (!$resultset) {
    return;
}

asset("image/bild.jpg");
?>

<table>
    <tr>
        <th>Rad</th>
        <th>Id</th>
        <th>Bild</th>
        <th>Titel</th>
        <th>År</th>
        <th>Uppdatera</th>
        <th>Ta bort</th>
    </tr>

<?php
    $id = -1; foreach ($resultset as $row) :
        $id++;
?>

    <tr>
        <td><?= $id ?></td>
        <td><?= $row->id ?></td>
        <td><img src="<?=asset($row->image) ?>?w=200%&h=150"></td>
        <td><?= $row->title ?></td>
        <td><?= $row->year ?></td>
        <td class="update"><a href="updateMovie?id=<?= $row->id ?>"><i class="fas fa-edit"></i></a></td>
        <td class="delete"><a href="deleteMovie?id=<?= $row->id ?>"><i class="fas fa-trash-alt"></i></a></td>
    </tr>

    <?php
    endforeach;
    ?>
</table>
