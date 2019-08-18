<?php
ob_start();
?>

<section class="section-1">
    <div class="miniheader d-flex align-items-center">
        <div class="gradient"></div>
        <div class="container-fluid content">
            <h2 data-aos="fade-right" data-aos-delay="300">Chapitres</h2>
        </div>
    </div>
</section>
<div class="container">
    <div class="admintitle">
        <h2 data-aos="fade-right" data-aos-delay="300">Ajouter un nouveau chapitre</h2>
    </div>

    <div>
        <?php if(isset($_SESSION['chapterpost-error'])): ?>
            <p><div class="alert alert-danger col-xs-10 col-md-12 align-self-center text-center"><?= $_SESSION['chapterpost-error'] ?></div></p>
            <?php unset($_SESSION['chapterpost-error']); ?>
        <?php elseif (isset($_SESSION['chapterpost-success'])): ?>
            <p><div class="alert alert-success col-xs-10 col-md-12"><?= $_SESSION['chapterpost-success'] ?></div></p>
            <?php unset($_SESSION['chapterpost-success']); ?>
        <?php endif; ?>
    </div>

    <form method="post" action="chapter-post">
        <input type="text" name="title" class="form-control" id="title" placeholder="Saisissez le titre"
               required><br>
        <textarea name="text" id="textarea-tinymce">
        </textarea><br>
        <button type="submit" class="btn btn-primary">Publier</button>
    </form><br>
    <hr>
</div>

<script src="vendor/tinymce/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#textarea-tinymce',
        language: 'fr_FR',
        width: '100%',
        height: 300,
        menubar: false,
    });
</script>

<?php
$content = ob_get_clean();
require 'src/View/templateAdmin.php';
?>
