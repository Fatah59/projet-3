<?php
ob_start();
?>
<!--Section-1-->
<section class="section-1">
    <div class="miniheader d-flex align-items-center">
        <div class="gradient"></div>
        <div class="container-fluid content">
            <h1 data-aos="fade-right" data-aos-delay="300">Newsletter</h1>
        </div>
    </div>
</section>

<section class="section-6" data-aos="fade-up">
    <div class="container">
        <div class="row main" data-aos="fade-up" data-aos-delay="300">
            <div class="col-lg-6 col-sm-12 col1">
                <div class="heading">
                    <h3>Se désabonner</h3>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col1">
                <form method="post" action="newsletter-delete-mail">
                    <div class="input-group">
                        <input name="newsletter-mail" id="newsletter-mail" type="email" placeholder="Entrez votre email" required>
                        <button class="btn btn-info" type="submit">valider</button>
                    </div>
                    <div>
                        <?php if(isset($_SESSION['newsletter-deleted-error'])): ?>
                            <p><div class="alert alert-danger"><?= $_SESSION['newsletter-deleted-error'] ?></div></p>
                            <?php unset($_SESSION['newsletter-deleted-error']); ?>
                        <?php elseif (isset($_SESSION['newsletter-deleted-success'])): ?>
                            <p><div class="alert alert-success"><?= $_SESSION['newsletter-deleted-success'] ?></div></p>
                            <?php unset($_SESSION['newsletter-deleted-success']); ?>
                        <?php endif; ?>
                    </div>
                    <div id="anchor"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>
