<?php

namespace Anax\View;

asset("image/bild.jpg");
?>

<h1>[404 page not found]</h1>

<img src="<?=asset("image/404.jpg") ?>?w=400%&h=300">
<h3>Sidan kunde tyvärr inte hittas</h3>
<p>Detta kan bero på lite av varje, till exempel kanske inte inlägget du vill besöka är skrivet än.</p>
<p><a href="<?= url("blogg/showBlogs") ?>">Återgå till startsidan</a> för bloggen och välj ett annat inlägg eller en annan sida</p>
