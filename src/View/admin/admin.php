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
                <h2 data-aos="fade-right" data-aos-delay="300">Administration</h2>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="admintitle">
            <h2 data-aos="fade-right" data-aos-delay="300">Tableau de bord</h2>
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
                                <h4><a href="signalement-admin">Nombre de signalement : <?= htmlspecialchars($nbReports) ;?></a></h4>
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
                                <h4><a href="commentaires-admin">Nombre de commentaire sur le blog : <?= htmlspecialchars($nbComments) ;?></a></h4>
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
                                <h4><a href="chapitres-admin">Nombre de chapitres publié : <?= htmlspecialchars($nbChapter) ;?></a></h4>
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