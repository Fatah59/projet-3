<?php
ob_start();
?>
<!--Section-1-->
<section class="section-1">
    <div class="jumbotron d-flex align-items-center">
        <div class="gradient"></div>
        <div class="container-fluid content">
            <h1 data-aos="fade-right" data-aos-delay="300">Welcome to more.</h1>
            <h2 data-aos="fade-left" data-aos-delay="300">the multipurpose psd wordrpess theme</h2>
        </div>
        <!--container-fluid end-->
    </div>
</section>

<!-- About Section Start -->
<div id="about-us">
    <div class="container">
        <h3>A propos de moi</h3>
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


