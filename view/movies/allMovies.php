<?php

namespace Anax\View;

if (!$resultset) {
    return;
}

asset("image/bild.jpg");

$filePrefix = "";
$route = currentRoute();

if (substr_count($route, "?") == 1) {
    $filePrefix = "/";
}

$defaultRoute = $filePrefix . "allMovies?";
?>

<p class="pagination">Filmer per sida:
    <a href="<?= mergeQueryString(["hits" => 2], $defaultRoute) ?>">2</a> |
    <a href="<?= mergeQueryString(["hits" => 4], $defaultRoute) ?>">4</a> |
    <a href="<?= mergeQueryString(["hits" => 8], $defaultRoute) ?>">8</a>
</p>

<table>
    <tr>
        <th>Rad</th>
        <th>Id <?= orderby2("id", $defaultRoute) ?></th>
        <th>Bild <?= orderby2("image", $defaultRoute) ?></th>
        <th>Titel <?= orderby2("title", $defaultRoute) ?></th>
        <th>År <?= orderby2("year", $defaultRoute) ?></th>
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

<p class="pagination">
    Sidor:
    <?php for ($i = 1; $i <= $max; $i++) : ?>
        <a href="<?= mergeQueryString(["page" => $i], $defaultRoute) ?>"><?= $i ?></a>
    <?php endfor; ?>
</p>
