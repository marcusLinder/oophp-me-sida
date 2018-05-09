<?php

namespace Andax\View;

?>

<h1>Testsida för textfilter</h1>
<h2>Testar BBcode</h2>
<h4>Oformaterad</h4>
<pre><?= $bbText ?></pre>
<h4>Formaterad</h4>
<p><?= $bbFormat ?></p>
<br>
<hr>
<h2>Testar Länk</h2>
<h4>Oformaterad</h4>
<pre><?= $linkText ?></pre>
<h4>Formaterad</h4>
<p><?= $linkFormat ?></p>
<br>
<hr>
<h2>Testar Markdown</h2>
<h4>Oformaterad</h4>
<pre><?= $mdText ?></pre>
<h4>Formaterad</h4>
<p><?= $mdFormat ?></p>
<br>
<hr>
<h2>Testar nl2br</h2>
<h4>Oformaterad</h4>
<pre><?= $nl2brText ?></pre>
<h4>Formaterad</h4>
<p><?= $nl2brFormat ?></p>
<br>
<hr>
<h2>Testar strip_tag</h2>
<h4>Oformaterad</h4>
<pre><?= $stripText ?></pre>
<h4>Formaterad</h4>
<p><?= $stripFormat ?></p>
<br>
<hr>
<h2>Testar esc för htmlentities</h2>
<h4>Oformaterad</h4>
<pre><?= $escText ?></pre>
<h4>Formaterad</h4>
<p><?= $escFormat ?></p>
<br>
<hr>
