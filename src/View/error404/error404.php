<?php
ob_start();
?>
    <!--Section-1-->
    <section class="section-1">
        <div class="jumbotron d-flex align-items-center">
            <div class="gradient"></div>
            <div class="container-fluid content">
                <h1 data-aos="fade-up" data-aos-delay="100">Erreur 404 - Page non trouvée</h1><br />
                <h4 data-aos="fade-up" data-aos-delay="500">Nous sommes désolés,</h4>
                <p><h4 data-aos="fade-up" data-aos-delay="500">mais la page que vous recherchez n'existe pas.</h4></p>
                <p data-aos="fade-up" data-aos-delay="700"><a href="accueil" class="btn btn-success">Retourner à l'accueil</a></p>
            </div>
        </div>
    </section>

<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>