<?php
ob_start();
?>

<style>
    .jumbotron {width: 100%;height: 250px;}
    .jumbotron h2 {padding-bottom: 0;}
</style>
<!--Section-1-->
<section class="section-1">
    <div class="jumbotron d-flex align-items-center">
        <div class="gradient"></div>
        <div class="container-fluid content">
            <h1 data-aos="fade-right" data-aos-delay="300">Chapitres</h1>
        </div>
    </div>
</section>


<div class="chapterspage">
    <?php foreach ($result as $data): ?>
        <h3><p><?= htmlspecialchars($data->getTitle());?></p></h3>
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
