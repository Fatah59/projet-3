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
    <link rel="stylesheet" href="public/css/animate.css">
    <link rel="stylesheet" href="public/css/main.css">



    <title>"Projet 3"</title>
</head>

<body>

<header class="header bg">
    <div class="container text-white">
        <div class="row">
            <div class="col-sm-4 align-self-center text-left">
                <!--<h6>Estd 1905</h6>--!>
            </div>
            <div class="col-sm-4 col-12 align-self-center box-1 text-center">
                <a class="navbar-brand" href="accueil"><img src="public/image/header-logo.jpg" alt="logo"></a>
            </div>
            <div class="col-sm-4 align-self-center text-right">
                <div class="social-icons">
                    <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                    <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!--/row-->
    </div>
    <!--container-->
</header>
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
                    <a class="nav-link" href="#">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chapitres">Chapitres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
    <!--container end-->
</nav>





<?= $content; ?>

<section class="section-7">
    <!-- Footer -->
    <footer class="page-footer font-small stylish-color-dark">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">


                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-lg-2 col-sm-4 box-2 mx-auto">

                    <!-- Links -->
                    <h5>Navigation du site</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="accueil">Accueil</a>
                        </li>
                        <li>
                            <a href="#">A propos</a>
                        </li>
                        <li>
                            <a href="chapitres">Chapitres</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <li>
                            <a href="#">Connexion</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-lg-2 col-sm-4 box-3 mx-auto">

                    <!-- Links -->
                    <h5>information</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">user login</a>
                        </li>
                        <li>
                            <a href="#!">creat new account</a>
                        </li>
                        <li>
                            <a href="#!">checkout</a>
                        </li>
                        <li>
                            <a href="#!">my cart</a>
                        </li>
                        <li>
                            <a href="#!">other information</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-lg-2 col-sm-4 box-4 mx-auto">

                    <!-- Links -->
                    <h5>policies & Info</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Terms Conditions </a>
                        </li>
                        <li>
                            <a href="#!">website polocy</a>
                        </li>
                        <li>
                            <a href="#!">Policy for Sellers </a>
                        </li>
                        <li>
                            <a href="#!">Policy for Buyers</a>
                        </li>
                        <li>
                            <a href="#!">Shipping & Refund </a>
                        </li>
                        <li>
                            <a href="#!">Wholesale Policy</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center">
            <div class="gradient"></div>
            <p>© 2019, All Rights reserved. designed by<a href="#"> DERRADJ Fatah</a></p>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

</script>

</body>
</html>





<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
--!>

