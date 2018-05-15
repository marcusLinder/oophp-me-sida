<?php

    namespace Anax\View;

?>

<form class="movieForms" method="post">
    <fieldset>
    <legend>Ange användarnamn och lösenord</legend>
    <p><label>Användarnamn:<br><input type="text" name="username"></label></p>
    <p><label>Lösenord:<br><input type="password" name="password" required></p>

    <p><input type="submit" name="login" value="Logga in"><br><br>
        <?= $info ?>
    </p>
    </fieldset>
</form>
