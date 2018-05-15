<?php
    namespace Anax\View;

?>

<table>
    <tr class="first">
        <th>Rad</th>
        <th>Id</th>
        <th>Title</th>
        <th>Type</th>
        <th>Status</th>
        <th>Published</th>
        <th>Deleted</th>
    </tr>
<?php $id = -1; foreach ($resultset as $row) :
    $id++;
?>
    <tr>
        <td><?= $id ?></td>
        <td><?= $row->id ?></td>
        <td><a href="pageView?path=<?= $row->path ?>"><?= $row->title ?></a></td>
        <td><?= $row->type ?></td>
        <td><?= $row->status ?></td>
        <td><?= $row->published ?></td>
        <td><?= $row->deleted ?></td>
    </tr>
<?php
endforeach;
?>

</table>
