<?php
ob_start();
?>

<h1>Hello world !</h1>
<form method="post" action="test-send">
    <label for="pseudo">Pseudo</label>
    <input type="text" id="pseudo" name="pseudo">
    <label for="text">Texte</label>
    <input type="text" id="text" name="text">
    <button type="submit">Valider</button>
</form>

<a href="chapitres">Voir les chapitres</a>
<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>
