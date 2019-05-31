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
                    <a href="blog.html"><img src="images/blog-1.jpg" class="figure-img img-fluid" alt="blog"></a>
                    <figcaption class="figure-caption">
                        <h2><a href="blog.html">Beautiful girl holding her camera in neck for a photo shoot</a></h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five</p>
                        <a href="blog_single.html" class="btn btn-success">+ more</a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-lg-8 col-sm-12 col-12" data-aos="fade-left" data-aos-delay="300">
                <div class="row" >
                    <div class="col-sm-6 col-12 box-2">
                        <figure class="figure">
                            <a href="blog.html"><img src="images/blog-2.jpg" class="figure-img img-fluid" alt="blog"></a>
                        </figure>
                    </div>
                    <div class="col-sm-6 col-12 box-3">
                        <h4><a href="blog.html">Girl working seriously on laptop in office hours</a></h4>
                        <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. specimen book. It has survived not only five</h5>
                        <a href="blog_single.html" class="btn btn-success">+ more</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-12 box-4">
                        <figure class="figure">
                            <a href="blog.html"><img src="images/blog-3.jpg" class="figure-img img-fluid" alt="blog"></a>
                        </figure>
                    </div>
                    <div class="col-sm-6 col-12 box-5">
                        <h4><a href="blog.html">Girl working seriously on laptop in office hours </a></h4>
                        <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. specimen book. It has survived not only five</h5>
                        <a href="blog_single.html" class="btn btn-success">+ more</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-12 box-6">
                        <figure class="figure">
                            <a href="blog.html"><img src="images/blog-1.jpg" class="figure-img img-fluid" alt="blog"></a>
                        </figure>
                    </div>
                    <div class="col-sm-6 col-12 box-7">
                        <h4><a href="blog.html">Girl working seriously on laptop in office hours </a></h4>
                        <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. specimen book. It has survived not only five</h5>
                        <a href="blog_single.html" class="btn btn-success">+ more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!--container-->



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
    <a href="chapitre&id=<?= $data->getId();?>"> Lire la suite </a>
    <?php endforeach; ?>
</div>

    <section class="section-6">
        <div class="container">
            <!-- Grid row-->
            <div class="row main">
                <!-- Grid column -->
                <div class="col-lg-6 col-sm-12 col1">
                    <div class="heading">
                        <h3>Adhérez à ma Newsletter</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col1">
                    <form>
                        <div class="input-group">
                            <input name="email" id="email" type="email" placeholder="Entrez un email valide" required>
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
