<?php
ob_start();
?>

    <section class="section-1">
        <div class="miniheader d-flex align-items-center">
            <div class="gradient"></div>
            <div class="container-fluid content">
                <h2 data-aos="fade-right" data-aos-delay="300">Signalement</h2>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-12 box-1"  data-aos="fade-up" data-aos-delay="300">
                    <div class="row box">
                        <?php if (isset($_SESSION['removesignalcomment-success'])): ?>
                        <div class="container">
                            <div class="alert alert-success align-self-center text-center col-xs-6 col-md-12">
                                <p><?= $_SESSION['removesignalcomment-success'] ?></p>
                            </div>
                            <?php unset($_SESSION['removesignalcomment-success']); ?>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['moderatesignalcomment-success'])): ?>
                                <div class="alert alert-success align-self-center text-center col-xs-6 col-md-12">
                                    <p><?= $_SESSION['moderatesignalcomment-success'] ?></p>
                                </div>
                                <?php unset($_SESSION['moderatesignalcomment-success']); ?>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="report-table">
                                    <thead>
                                    <tr>
                                        <th class="reported-comment"><strong>Commentaire signalé</strong></th>
                                        <th class="report-action"><strong>Action</strong></th>
                                    </tr>
                                    </thead>

                                    <?php foreach ($result as $data): ?>
                                        <tbody><tr>
                                            <td>
                                                <?= htmlspecialchars($data->getText());?>
                                            </td>
                                            <td>
                                                <a href="moderer-signalement&com_id=<?= $data->getId(); ?>&chapter_id=<?= $data->getChapterId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir modérer ce commentaire ?')">Modérer le commentaire</a><hr>
                                                <a href="retirer-signalement&com_id=<?= $data->getId(); ?>&chapter_id=<?= $data->getChapterId(); ?>" class="btn btn-primary btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir retirer ce signalement ?')">Retirer le signalement</a>
                                            </td>
                                        </tr></tbody>
                                    <?php endforeach;?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
$content = ob_get_clean();
require 'src/View/templateAdmin.php';
?>