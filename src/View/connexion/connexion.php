<?php
ob_start();
?>

<?php if (isset($_SESSION['flash'])) : ?>
    <p><?= $_SESSION['flash']; ?></p>
    <?php unset($_SESSION['flash']); endif; ?>

    <!--Section-1-->
    <section class="section-1">
        <div class="miniheader d-flex align-items-center">
            <div class="gradient"></div>
            <div class="container-fluid content">
                <h1 data-aos="fade-right" data-aos-delay="300">Connexion</h1>
            </div>
        </div>
    </section>

    <!-- Connexion section Start -->
    <div id="contact">
        <div class="container py-5">
            <div class="row" data-aos="fade-up" data-aos-delay="300">
                <div class="col-md-12">
                    <div>
                        <?php if (isset($_SESSION['connexion-fail'])): ?>
                            <p><div class="alert alert-danger col-xs-10 col-md-12 text-center"><?= $_SESSION['connexion-fail'] ?></div></p>
                            <?php unset($_SESSION['connexion-fail']); ?>
                        <?php elseif (isset($_SESSION['connexion-success'])): ?>
                            <p><?= $_SESSION['connexion-success'] ?></p>
                            <?php unset($_SESSION['connexion-success']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <form method="post" action="admincheck">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Identifiant"
                               required>
                    </div>
                    <div class="col-sm-12">
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Mot de passe" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>
    <!-- Connexion section Ended -->

<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>