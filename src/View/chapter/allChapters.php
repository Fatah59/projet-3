<?php
ob_start();
?>
<div>
    <?php foreach ($chapters as $data): ?>
    <p><?= htmlspecialchars($data->getPseudo())?></p>
    <p><?= htmlspecialchars($data->getText())?></p>
    <hr>
    <?php endforeach; ?>
</div>
<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>
