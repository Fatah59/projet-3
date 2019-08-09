<?php
ob_start();
?>
<!--Section-1-->
<section class="section-1">
    <div class="miniheader d-flex align-items-center">
        <div class="gradient"></div>
        <div class="container-fluid content">
            <h1 data-aos="fade-right" data-aos-delay="300">Chapitres</h1>
        </div>
    </div>
</section>

<section class="services">
    <?php foreach ($result as $data): ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-12 box-1"  data-aos="fade-up" data-aos-delay="300">
                    <div class="row box">
                        <div class="col-sm-12 col-12">
                            <h3><?= htmlspecialchars($data->getTitle());?></h3>
                            <p><?= substr ($data->getText(), 0, 450)?>...</p>
                            <p><?= htmlspecialchars($data->getCreationDate());?></p>
                            <a href="chapitre&id=<?= $data->getId();?>" class="btn btn-success">Lire la suite</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>
