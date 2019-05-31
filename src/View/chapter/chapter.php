<?php
ob_start();
?>
<h1><?= $result->getTitle();?></h1>

<p><?= $result->getText();?></p>

<p><?= $result->getCreationDate();?></p>

<?php foreach ($comments as $data) : ?>

<p><?= $data->getPseudo() ;?></p>

<p><?= $data->getText() ;?></p>

<p><?= $data->getCreationDate() ;?></p>
<hr>
<?php endforeach; ?>


<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>

