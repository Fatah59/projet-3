<?php
ob_start();
?>

<section class="section-1">
    <div class="miniheader d-flex align-items-center">
        <div class="gradient"></div>
        <div class="container-fluid content">
            <h1 data-aos="fade-right" data-aos-delay="300">Chapitres</h1>
        </div>
    </div>
</section>
<div class="container">

    <div>
        <?php if(isset($_SESSION['chapteredit-error'])): ?>
            <p><div class="alert alert-danger col-xs-10 col-md-6"><?= $_SESSION['chapteredit-error'] ?></div></p>
            <?php unset($_SESSION['chapteredit-error']); ?>
        <?php endif; ?>
    </div>

    <form method="post" action="chapter-edited">
        <?php foreach ($result as $data): ?>
        <input type="text" name="title" class="form-control" id="title" value="<?= ($data->getTitle());?>"
               required><br>
        <textarea name="text" id="textarea-tinymce"><?= ($data->getText());?>
        </textarea><br>
            <input type="hidden" name="chapterId" value="<?php echo $data->getId(); ?>"/>
        <button type="submit" class="btn btn-primary">Publier</button>
        <?php endforeach;?>
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
