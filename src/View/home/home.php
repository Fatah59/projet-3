<?php
ob_start();
?>

<h1>Hello world !</h1>
<?php if(isset($_SESSION['flash'])) : ?>
<p><?= $_SESSION['flash']; ?></p>
<?php unset($_SESSION['flash']); endif;?>

<form method="post" action="test-send">
    <label for="pseudo">Pseudo</label>
    <input type="text" id="pseudo" name="pseudo">
    <label for="text">Texte</label>
    <input type="text" id="text" name="text">
    <button type="submit">Valider</button>
</form>

<a href="chapitres">Voir les chapitres</a>

<div>
    <?php foreach ( $result as $data):?>
    <p>
        <?= $data->getTitle();?>
    </p>
    <p>
        <?= $data->getText();?>
    </p>
    <p>
        <?= $data->getCreationDate();?>
    </p>
    <a href="chapitre&id=<?= $data->getId();?>"> Voir la suite </a>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>
