<!DOCTYPE html>
<html lang="fr">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/animate.css">
    <link rel="stylesheet" href="public/css/template.css">

    <title>"Projet 3"</title>
</head>

<main>
    <header class="header bg">
        <div class="container text-white">
            <div class="row">
                <div class="col-sm-4 align-self-center text-left">
                    <h6>"L'écriture ma passion !"</h6>
                </div>
                <div class="col-sm-4 col-12 align-self-center box-1 text-center">
                    <a class="navbar-brand" href="accueil"><img src="public/image/header-logo-jean.jpg" alt="logo"></a>
                </div>
                <div class="col-sm-4 align-self-center text-right">
                    <div class="social-icons">
                        <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                        <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</main>
<span class="position-absolute trigger"><!-- hidden trigger to apply 'stuck' styles --></span>
<nav class="navbar navbar-expand-sm sticky-top navbar-dark">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link active" href="accueil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="a-propos">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chapitres">Chapitres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="containerpage">
    <?= $content; ?>
</main>

<section class="section-7">
    <!-- Footer -->
    <footer class="page-footer font-small stylish-color-dark">
        <!-- Footer Links -->
        <div class="container text-center text-md-left">
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-lg-5 col-sm-12 mx-auto box-1">
                    <!-- Content -->
                    <a href="accueil"><img src="public/image/footer-logo-jean.png" alt="footer-logo"></a>
                    <p>Vous souhaitez en savoir plus sur moi et mes oeuvres ?</p>
                    <p>Je vous invite à consulter la rubrique <a href="#">"A propos".</a></p>

                </div>
                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none">
                <!-- Grid column -->
                <div class="col-lg-2 col-sm-4 box-2 mx-auto">
                    <!-- Links -->
                    <h5>Navigation du Site</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="accueil">Accueil</a>
                        </li>
                        <li>
                            <a href="a-propos">A propos</a>
                        </li>
                        <li>
                            <a href="chapitres">Chapitres</a>
                        </li>
                        <li>
                            <a href="contact">Contact</a>
                        </li>
                        <li>
                            <a href="connexion">Connexion</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none">
                <!-- Grid column -->
                <div class="col-lg-2 col-sm-4 box-3 mx-auto">
                    <!-- Links -->
                    <h5>informations</h5><br>
                    <ul class="list-unstyled">
                        <li>
                            <a href="mentions-legales">mentions légales</a>
                        </li>
                        <li>
                            <a href="cgu">cgu</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none">
                <!-- Grid column -->
                <div class="col-lg-2 col-sm-4 box-4 mx-auto">
                    <!-- Links -->
                    <h5>mes réseaux sociaux</h5>
                    <ul class="list-unstyled">
                        <div class="social-icons">
                            <li>
                                <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"> Facebook</i></a>
                            </li>
                            <li>
                                <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter" aria-hidden="true"> Twitter</i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram" aria-hidden="true"> Instagram</i></a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center">
            <div class="gradient"></div>
            <p>© 2019,<a href="mentions-legales">  All Rights reserved.</a></p>
        </div>
    </footer>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script src="public/js/animate.js"></script>
<script src="public/js/custom.js"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>

</body>
</html>


