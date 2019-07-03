<?php
ob_start();
?>

<?php if(isset($_SESSION['flash'])) : ?>
    <p><?= $_SESSION['flash']; ?></p>
    <?php unset($_SESSION['flash']); endif;?>

<div class="onechapter">
    <h1><?= $result->getTitle(); ?></h1><br />
    <p><?= $result->getText();?></p>
    <p><?= $result->getCreationDate(); ?></p><br /><hr>

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
                <p><?= $_SESSION['commentpost-error'] ?></p>
                <?php unset($_SESSION['commentpost-error']); ?>
            <?php elseif (isset($_SESSION['commentsend-success'])): ?>
                <p><?= $_SESSION['commentsend-success'] ?></p>
                <?php unset($_SESSION['commentsend-success']); ?>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Envoyez votre commentaire</button>
        <input type="hidden" name="chapterId" value="<?php echo $result->getId(); ?>"/>
    </form><br />
    <hr>

    <?php if (isset($_SESSION['signalcomment-success'])): ?>
        <p><?= $_SESSION['signalcomment-success'] ?></p>
        <?php unset($_SESSION['signalcomment-success']); ?>
    <?php endif; ?>

    <?php foreach ($result->getComments() as $data) : ?>
        <p><strong><u><?= $data->getPseudo();?></u></strong></p>
        <p><?= $data->getText();?></p>
        <p><?= $data->getCreationDate();?></p>

    <div>


        <a href="signal-comment&com_id=<?= $data->getId(); ?>&chapter_id=<?= $result->getId(); ?>" class="btn btn-primary btn-sm" onclick="return confirm('Êtes-vous sûr de signaler ce commentaire ?')">Signalez ce commentaire</a>

        <hr><br />
    </div>

    <?php endforeach; ?>

</div>

<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>


