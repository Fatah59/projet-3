<?php
ob_start();
?>
<h1><?= $result->getTitle();?></h1>

<p><?= $result->getText();?></p>

<p><?= $result->getCreationDate();?></p>



<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>

