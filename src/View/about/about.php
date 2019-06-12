<?php
ob_start();
?>

<style>
    .jumbotron {width: 100%;height: 250px;}
    .jumbotron h2 {padding-bottom: 0;}
</style>
<!--Section-1-->
<section class="section-1">
    <div class="jumbotron d-flex align-items-center">
        <div class="gradient"></div>
        <div class="container-fluid content">
            <h1 data-aos="fade-right" data-aos-delay="300">Bienvenue sur mon Blog</h1>
        </div>
        <!--container-fluid end-->
    </div>
</section>

<!-- About Section Start -->

<div id="about-us">
    <div class="container">
        <h3>A propos </h3>
        <div class="row" style="margin-right: 0; margin-left: 0;" data-aos="fade-up" data-aos-delay="300">
            <div>
                <img src="images/about.jpg" alt="about-bg" class="thumbnail image">
                <p><?= $result->getText();?></p>
            </div>
        </div>
    </div>
</div>


<!-- About Section End -->

<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>


