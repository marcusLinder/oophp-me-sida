<?php
namespace Anax\View;

$loggedIn = $loggedIn ?? false;
?>

<nav class="nav-redovisning">
    <ul>
        <li><a href="<?= url("blogg/showBlogs") ?>">Visa alla blogginlägg</a></li>
        <li><a href="<?= url("blogg/showPages") ?>">Alla sidor</a></li>
        <?php if ($loggedIn) : ?>
        <li><a href="<?= url("blogg/admin") ?>">Admin</a></li>
        <li><a href="<?= url("blogg/createContent") ?>">Nytt innehåll</a></li>
        <li><a href="<?= url("blogg/logout") ?>">Logga ut <i class="fas fa-sign-out-alt"></i></a><li>
    <?php endif; ?>
    <?php if (!$loggedIn) : ?>
        <li><a href="<?= url("blogg/login") ?>">Logga in</a></li>
    <?php endif; ?>
    </ul>
</nav>
