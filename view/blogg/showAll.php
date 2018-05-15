<?php

namespace Anax\View;

if (!$resultset) {
    return;
}

$filePrefix = "";
$route = currentRoute();

if (substr_count($route, "?") == 1) {
    $filePrefix = "/";
}

$defaultRoute = $filePrefix . "admin?";
?>

<p class="pagination">Innehåll per sida:
    <a href="<?= mergeQueryString(["hits" => 2], $defaultRoute) ?>">2</a> |
    <a href="<?= mergeQueryString(["hits" => 4], $defaultRoute) ?>">4</a> |
    <a href="<?= mergeQueryString(["hits" => 8], $defaultRoute) ?>">8</a>
</p>

<table>
    <tr class="first">
        <th>Id <?= orderby2("id", $defaultRoute) ?></th>
        <th>Title <?= orderby2("title", $defaultRoute) ?></th>
        <th>Type <?= orderby2("type", $defaultRoute) ?></th>
        <th>Path <?= orderby2("path", $defaultRoute) ?></th>
        <th>Slug <?= orderby2("slug", $defaultRoute) ?></th>
        <th>Published <?= orderby2("published", $defaultRoute) ?></th>
        <th>Created <?= orderby2("created", $defaultRoute) ?></th>
        <th>Updated <?= orderby2("updated", $defaultRoute) ?></th>
        <th>Deleted <?= orderby2("deleted", $defaultRoute) ?></th>
        <th>Uppdatera</th>
        <th>Delete</th>
    </tr>
<?php $id = -1; foreach ($resultset as $row) :
    $id++;
?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->title ?></td>
        <td><?= $row->type ?></td>
        <td><?= $row->path ?></td>
        <td><?= $row->slug ?></td>
        <td><?= $row->published ?></td>
        <td><?= $row->created ?></td>
        <td><?= $row->updated ?></td>
        <td><?= $row->deleted ?></td>
        <td class="update"><a href="updateContent?id=<?= $row->id ?>"><i class="fas fa-edit"></i></a></td>
        <td class="delete"><a href="removeContent?id=<?= $row->id ?>"><i class="fas fa-trash-alt"></i></a></td>
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
