<?php
ob_start();
?>
<div class="onechapter">
    <h1><?= $result->getTitle(); ?></h1>
    <p><?= $result->getText();?></p>
    <p><?= $result->getCreationDate(); ?></p>

    <?php foreach ($result->getComments() as $data) : ?>
        <p><?= $data->getPseudo();?></p>
        <p><?= $data->getText();?></p>
        <p><?= $data->getCreationDate();?></p>
        <a href="#"> Signaler ce commentaire </a>
        <hr>

    <?php endforeach; ?>
    <form method="post" action="comment_post.php">
        <div class="form-group row">
            <div class="col-sm-6">
                <h3><label for="inputname">Postez un commentaire</label></h3>
                <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom" required>
                <br>
                <input type="text" class="form-control" id="email" placeholder="Votre email" required>
            </div>
        </div>
        <br><div class="form-group row">
            <div class="col-xs-6 col-md-6">
                <textarea type="text" class="form-control" id="text" placeholder="Votre message" rows="9" required></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Soumettre votre commentaire</button>
    </form>
</div>

<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>


