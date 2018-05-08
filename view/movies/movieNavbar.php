<?php
namespace Anax\View;

?>

<nav class="nav-redovisning">
    <ul>
        <li><a href="<?= url("movie/allMovies") ?>">Vissa alla filmer</a></li>
        <li><a href="<?= url("movie/searchYear") ?>">Sök efter utgivningsår</a></li>
        <li><a href="<?= url("movie/searchTitle") ?>">Sök efter titel</a></li>
        <li><a href="<?= url("movie/addMovie") ?>">Lägg till en ny film</a></li>
    </ul>
</nav>
