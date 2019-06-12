<?php
ob_start();
?>

<?php if(isset($_SESSION['flash'])) : ?>
<p><?= $_SESSION['flash']; ?></p>
<?php unset($_SESSION['flash']); endif;?>

<!-- Contact section Start -->
<div id="contact">
  <div class="container">
  <h3>Contact Us</h3>
  <div class="row" data-aos="fade-up" data-aos-delay="300">
      <div class="col-md-12 text-left">
          <p>Lorem Ipsum is simply dummy text of the printing and scrambled it to make a type specimen book. It has survived not only fiveLorem Ipsum is simply dummy text of the printing and scrambled it to make a type specimen book. It has survived not only fiveLorem Ipsum is simply dummy text of the printing and scrambled it to make a type specimen book. I</p>
      </div>
  </div>
    </div>
     <div class="container py-5">
      <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-md-12">
              <form>
                  <div class="form-group row">
                      <div class="col-sm-6">
                          <label for="inputname">Votre nom</label>
                          <input type="text" name="name" class="form-control" id="inputname" placeholder="Your Name" required>
                      </div>
                          <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="Your Email" required>
                      </div>
                      <div class="col-sm-12">
                          <input type="number" class="form-control" placeholder="Your Phont Number" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-xs-12 col-md-12">
                          <textarea type="text" class="form-control" placeholder="Your Message" rows="6" required></textarea>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Alright Submit it</button>
              </form>
          </div>
      </div>
     </div>
</div>

<!-- Contact section Ended -->

<?php
$content = ob_get_clean();
require 'src/View/template.php';
?>