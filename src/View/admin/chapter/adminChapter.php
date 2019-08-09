<?php
ob_start();
?>

    <section class="section-1">
        <div class="miniheader d-flex align-items-center">
            <div class="gradient"></div>
            <div class="container-fluid content">
                <h1 data-aos="fade-right" data-aos-delay="300">Chapitres</h1>
                <p data-aos="fade-right" data-aos-delay="300"><a href="ajout-chapitre" class="btn btn-success">Ajouter un chapitre</a></p>
            </div>
        </div>
    </section>



    <section class="services">
        <?php foreach ($result as $data): ?>
            <div class="container">
                <div>
                    <?php if (isset($_SESSION['chapterupdated-success'])): ?>
                        <p><div class="alert alert-success col-xs-10 col-md-12 align-self-center text-center"><?= $_SESSION['chapterupdated-success'] ?></div></p>
                        <?php unset($_SESSION['chapterupdated-success']); ?>
                    <?php endif; ?>
                </div>
                <div>
                    <?php if (isset($_SESSION['chapterpost-success'])): ?>
                        <p><div class="alert alert-success col-xs-10 col-md-12 align-self-center text-center"><?= $_SESSION['chapterpost-success'] ?></div></p>
                        <?php unset($_SESSION['chapterpost-success']); ?>
                    <?php endif; ?>
                </div>

                <div>
                    <?php if(isset($_SESSION['chapterdeleted-success'])): ?>
                        <p><div class="alert alert-success col-xs-10 col-md-12 align-self-center text-center"><?= $_SESSION['chapterdeleted-success'] ?></div></p>
                        <?php unset($_SESSION['chapterdeleted-success']); ?>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-12 box-1"  data-aos="fade-up" data-aos-delay="300">
                        <div class="row box">
                            <div class="col-sm-12 col-12">
                                <h3><?= htmlspecialchars($data->getTitle());?></h3>
                                <p><?= substr($data->getText(), 0, 450)?>...</p>
                                <p><?= htmlspecialchars($data->getCreationDate());?></p>
                                <input type="hidden" name="chapterId" value="<?php echo $data->getId(); ?>"/>
                                <a href="editer-chapitre&id=<?= $data->getId();?>" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de vouloir éditer ce chapitre ?')">Éditer</a>
                                <a href="supprimer-chapitre&id=<?= $data->getId();?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce chapitre ?')">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

<?php
$content = ob_get_clean();
require 'src/View/templateAdmin.php';
?>