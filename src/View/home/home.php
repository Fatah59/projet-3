<?php
ob_start();
?>

<!--Section-1-->
<section class="section-1">
    <div class="jumbotron d-flex align-items-center">
        <div class="gradient"></div>
        <div class="container-fluid content">
            <h1 data-aos="fade-up" data-aos-delay="100">Bienvenue sur mon Blog</h1>
            <h2 data-aos="fade-up" data-aos-delay="300">Découvrez mon dernier roman</h2>
            <h4 data-aos="fade-up" data-aos-delay="500">Un Billet simple pour l'Alaska</h4>
            <p><h4 data-aos="fade-up" data-aos-delay="500">Chapitre après chapitre</h4></p>
            <p data-aos="fade-up" data-aos-delay="700"><a href="about.html" class="btn btn-success">Lire le dernier chapitre</a></p>
        </div>
        <!--container-fluid end-->
    </div>
</section>

<section class="section-4">
    <div class="container">
        <div class="row heading">
            <div class="col-sm-6 col-12">
                <h3>Découvrez mon livre<span>au fur et à mesure</span></h3>
            </div>
            <div class="col-sm-6 col-12">
                <a href="chapitres" class="btn btn-success">Lire tous les chapitres publiés</a>
            </div>
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-lg-4 col-sm-12 col-12 box-1"  data-aos="fade-right" data-aos-delay="300">
                <figure class="figure">
                        <h2><?= htmlspecialchars($firstChapter->getTitle());?></h2>
                        <p><?= substr( htmlspecialchars($firstChapter->getText()), 0, 300);?>...</p>
                        <a href="chapitre&id=<?= $firstChapter->getId();?>" class="btn btn-success">Lire la suite</a>
                </figure>
            </div>
            <div class="col-lg-8 col-sm-12 col-12" data-aos="fade-left" data-aos-delay="300">
                <div class="row" >

                    <div class="col-lg-12 col-sm-6 col-12 box-3">
                        <div class="chaptershome">

                            <?php foreach ( $result as $data):?>
                                <p>
                                <h4><?= htmlspecialchars($data->getTitle());?></h4>
                                </p>
                                <p>
                                    <h5><?= substr( htmlspecialchars($data->getText()), 0, 300);?>...<h5>
                                </p>

                                <a href="chapitre&id=<?= $data->getId();?>" class="btn btn-success"> Lire la suite </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--container-->
</section>





    <section class="section-6" data-aos="fade-up">
        <div class="container">
            <!-- Grid row-->
            <div class="row main" data-aos="fade-up" data-aos-delay="300">
                <!-- Grid column -->
                <div class="col-lg-6 col-sm-12 col1">
                    <div class="heading">
                        <h3>Adhérez à ma Newsletter</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col1">
                    <form method="post" action="newsletter-add-mail">
                        <div class="input-group">
                            <div>
                                <?php if(isset($_SESSION['newsletter-error'])): ?>
                                <p><?= $_SESSION['newsletter-error'] ?></p>
                                <?php unset($_SESSION['newsletter-error']); ?>
                                <?php elseif (isset($_SESSION['newsletter-success'])): ?>
                                    <p><?= $_SESSION['newsletter-success'] ?></p>
                                    <?php unset($_SESSION['newsletter-success']); ?>
                                <?php endif; ?>

                            </div>
                            <input name="newsletter-mail" id="newsletter-mail" type="email" placeholder="Entrez un email valide" required>
                            <button class="btn btn-info" type="submit">S'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>
