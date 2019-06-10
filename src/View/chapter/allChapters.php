<?php
ob_start();
?>
<div class="chapterspage">
    <?php foreach ($result as $data): ?>
    <p><?= htmlspecialchars($data->getTitle());?></p>
    <p><?= substr( htmlspecialchars($data->getText()), 0, 450)?>...</p>
        <p><?= htmlspecialchars($data->getCreationDate());?></p>
        <a href="chapitre&id=<?= $data->getId();?>" class="btn btn-success">Lire la suite</a>
    <hr>
    <?php endforeach; ?>
</div>




<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>
