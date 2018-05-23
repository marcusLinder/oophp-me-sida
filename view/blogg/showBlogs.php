<?php

    namespace Anax\View;

if (!$resultset) {
    return;
}

$textFilter = new \Mals17\Filter\TextFilter();
?>

<article>

<?php foreach ($resultset as $row) : ?>
    <section>
        <header>
            <h1><a href="postView?slug=<?= esc($row->slug) ?>"><?= esc($row->title) ?></a></h1>
            <p><i>Published: <time datetime="<?= esc($row->published_iso8601) ?>" pubdate><?= esc($row->published) ?></time></i></p>
        </header>
        <?= substr($textFilter->parse($row->data, $row->filter), 0, 50) . "..."?><br><a href="postView?slug=<?= esc($row->slug) ?>">Läs mer..</a>
    </section>
<?php endforeach; ?>

</article>
