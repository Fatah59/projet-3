<?php
ob_start();
?>

<?php if(isset($_SESSION['flash'])) : ?>
    <p><?= $_SESSION['flash']; ?></p>
    <?php unset($_SESSION['flash']); endif;?>

<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-12 box-1"  data-aos="fade-up" data-aos-delay="300">
                <div class="row box">
                    <div class="col-sm-12 col-12">
                        <h1><?= $result->getTitle(); ?></h1><br />
                        <p><?= $result->getText();?></p>
                        <p><?= $result->getCreationDate(); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div id="anchor"></div>
        <div id="commentpost-error"></div>
        <form method="post" action="comment-post">
            <div class="form-group row">
                <div class="col-sm-6">
                    <h3>Postez un commentaire</h3><br />
                    <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Votre nom" required>
                </div>
            </div>
            <br><div class="form-group row">
                <div class="col-xs-10 col-md-6">
                    <textarea type="text" name="text" class="form-control" id="text" placeholder="Votre message" rows="9" required></textarea>
                </div>
            </div>
            <div>
                <?php if(isset($_SESSION['commentpost-error'])): ?>
                    <p><div class="alert alert-danger col-xs-10 col-md-6"><?= $_SESSION['commentpost-error'] ?></div></p>
                    <?php unset($_SESSION['commentpost-error']); ?>
                <?php elseif (isset($_SESSION['commentsend-success'])): ?>
                    <p><div class="alert alert-success col-xs-10 col-md-6"><?= $_SESSION['commentsend-success'] ?></div></p>
                    <?php unset($_SESSION['commentsend-success']); ?>
                <?php endif; ?>
            </div>
            <input type="hidden" name="chapterId" value="<?php echo $result->getId(); ?>"/>
            <button type="submit" class="btn btn-primary">Envoyez votre commentaire</button>
        </form>
        <br />
        <hr>
        <?php if (isset($_SESSION['signalcomment-success'])): ?>
            <p><div class="alert alert-success col-xs-10 col-md-6 align-self-center text-center"><?= $_SESSION['signalcomment-success'] ?></div></p>
            <?php unset($_SESSION['signalcomment-success']); ?>
        <?php endif; ?>

        <?php foreach ($result->getComments() as $data) : ?>
            <p><strong><u><?= $data->getPseudo();?></u></strong></p>
            <p><?php if ($data->getModerate()){
                    echo "Ce commentaire a été modéré par l'administrateur du site.";
                }elseif ($data->getReport()){
                    echo "Ce commentaire a été signalé à l'administrateur du site.";
                }else {
                    echo ($data->getText());
                } ;?></p>

            <p><?= $data->getCreationDate();?></p>
            <div>
                <a href="signal-comment&com_id=<?= $data->getId(); ?>&chapter_id=<?= $result->getId(); ?>" class="btn btn-primary btn-sm" onclick="return confirm('Êtes-vous sûr de signaler ce commentaire ?')"><span class="fa fa-exclamation-triangle">
                        Signalez ce commentaire</span></a>
                <hr><br />
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>


