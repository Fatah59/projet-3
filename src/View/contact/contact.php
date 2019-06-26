<?php
ob_start();
?>

<?php if(isset($_SESSION['flash'])) : ?>
    <p><?= $_SESSION['flash']; ?></p>
    <?php unset($_SESSION['flash']); endif;?>

    <!-- Contact section Start -->
    <div id="contact">
        <div class="container">
            <h3>Contact</h3>
            <div class="row" data-aos="fade-up" data-aos-delay="300">
                <div class="col-md-12 text-left">
                    <p>Bienvenue sur mon formulaire de contact</p>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row" data-aos="fade-up" data-aos-delay="300">
                <div class="col-md-12">
                    <form method="post" action="contact-add-msg">
                        <div>
                            <?php if(isset($_SESSION['contactmail-error'])): ?>
                                <p><?= $_SESSION['contactmail-error'] ?></p>
                                <?php unset($_SESSION['contactmail-error']); ?>
                            <?php elseif (isset($_SESSION['contactsend-success'])): ?>
                                <p><?= $_SESSION['contactsend-success'] ?></p>
                                <?php unset($_SESSION['contactsend-success']); ?>
                            <?php endif; ?>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="email" class="form-control" id="email" placeholder="Votre email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12 col-md-12">
                                <textarea type="text" name="message" class="form-control" id="message" placeholder="Votre message" rows="6" required></textarea>
                            </div>
                        </div>
                        <div class=""form-group row">
                        <div class=""col-xs-12 col-md-8">
                        <input type="checkbox" name="consent"  id="consentvalue">Je consens à ce que mes données soumises soient recueillies et stockées comme décrit par le site.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>


    <!-- Contact section Ended -->

<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>