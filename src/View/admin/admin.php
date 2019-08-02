<?php
ob_start();
?>

<?php if (isset($_SESSION['flash'])) : ?>
    <p><?= $_SESSION['flash']; ?></p>
    <?php unset($_SESSION['flash']); endif; ?>

    <section class="section-1">
        <div class="miniheader d-flex align-items-center">
            <div class="gradient"></div>
            <div class="container-fluid content">
                <h1 data-aos="fade-right" data-aos-delay="300">Administration</h1>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="admintitle">
            <h1 data-aos="fade-right" data-aos-delay="300">Tableau de bord</h1>
        </div>
        <div class="container">
            <?php if (isset($_SESSION['connexion-success'])): ?>
                <div class="alert alert-success col-xs-10 col-md-12 align-self-center text-center">
                    <p><?= $_SESSION['connexion-success'] ?></p>
                </div>
                <?php unset($_SESSION['connexion-success']); ?>
            <?php endif; ?>
        </div>

        <section class="services">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-12 box-1"  data-aos="fade-up" data-aos-delay="300">
                        <div class="row box">
                            <div class="col-sm-12 col-12">
                                <h4>Nombre de signalement : <?= htmlspecialchars($nbReports) ;?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-12 box-1"  data-aos="fade-up" data-aos-delay="300">
                        <div class="row box">
                            <div class="col-sm-12 col-12">
                                <h4>Nombre de commentaire sur le blog : <?= htmlspecialchars($nbComments) ;?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-12 box-1"  data-aos="fade-up" data-aos-delay="300">
                        <div class="row box">
                            <div class="col-sm-12 col-12">
                                <h4>Nombre de chapitres publié : <?= htmlspecialchars($nbChapter) ;?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php
$content = ob_get_clean();
require 'src/View/templateAdmin.php';
?>