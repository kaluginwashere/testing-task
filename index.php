<?php
session_start();
require_once('./src/header.php');
?>
<section class="main-sec">
  <div class="container ">
    <div class="row">
      <div class="col-12">
        <h1>Win Big for Super Bowl!</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-12 ">
        <a href="#form" class="main-btn">TAKE PART</a>
      </div>
    </div>
  </div>
</section>
<section class="about sec-margin" id="about">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="sec-heading text-center">Superbowl Prize Draw</h2>
      </div>
    </div>
    <div class="row  d-flex align-items-center">
      <div class="col-12 col-md-5"><img src="./src/assets/img/banner.png" class="img-fluid banner-img" alt="..."></div>
      <div class="col-md-1 col-0"></div>
      <div class="col-12 col-md-4">
        <div class="about-block my-5">
          <h3>Epic Prize Pool</h3>
          <p>Get a chance to win big with our Superbowl sweepstakes taking place during the game!</p>
        </div>
        <div class="about-block my-5">
          <h3>Easy to Enter</h3>
          <p>Just sign up and make an entry into the draw – it’s simpler than a field goal!</p>
        </div>
        <div class="about-block my-5">
          <h3>Instant Results</h3>
          <p>No time for dilly-dally! Winners will be announced instantly, so you’ll know if you’ve hit the jackpot.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="parnters sec-margin" id="partners">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="sec-heading text-center">Our partners</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-3"><img src="./src/assets/img/ps.png" class="img-fluid banner-img" alt="..."></div>
      <div class="col-3"><img src="./src/assets/img/lg.png" class="img-fluid banner-img" alt="..."></div>
      <div class="col-3"><img src="./src/assets/img/apple.png" class="img-fluid banner-img" alt="..."></div>
      <div class="col-3"><img src="./src/assets/img/nfl.png" class="img-fluid banner-img" alt="..."></div>
    </div>
  </div>
</section>


<section id="form" class="form sec-margin">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="sec-heading text-center">Participate Now</h2>
      </div>
    </div>

    <form action="./src/submit_feedback.php" method="post">
      <div class="row">
        <div class="col-12 col-md-8 mx-auto">
          <?php
          if (isset($_SESSION['success_message'])) {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']);
          } ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-8 mb-4 mx-auto">
          <label for="name" class="form-label">Fullname:</label>
          <input placeholder="Enter your full name" type="text" name="name" class="form-control" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>">
          <div class="text"><?php if (!empty($_SESSION['error_name'])) : ?>
              <?= $_SESSION['error_name'] ?>
            <?php endif; ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-8 mb-4 mx-auto">
          <label for="email" class="form-label">Email:</label>
          <input type="email" name="email" placeholder="Enter your email" class="form-control" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
          <div class="text"><?php if (!empty($_SESSION['error_email'])) : ?>
              <?= $_SESSION['error_email'] ?>
            <?php endif; ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-8 mb-4 mx-auto">
          <label for="phone" class="form-label">Phone Number:</label>
          <input type="number" name="phone" placeholder="Enter your phone number" class="form-control" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>">
          <div class="text"><?php if (!empty($_SESSION['error_phone'])) : ?>
              <?= $_SESSION['error_phone'] ?>
            <?php endif; ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-8 mb-4 mx-auto">
          <label for="adress" class="form-label">Adress:</label>
          <input type="text" name="adress" placeholder="Enter your adress" class="form-control" value="<?php echo isset($_SESSION['adress']) ? $_SESSION['adress'] : ''; ?>">
          <div class="text"><?php if (!empty($_SESSION['error_adress'])) : ?>
              <?= $_SESSION['error_adress'] ?>
            <?php endif; ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-8  mx-auto">
          <label for="message" class="form-label">Message:</label>
          <textarea name="message" placeholder="enter your message" class="form-control"><?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''; ?></textarea>
          <div class="text"><?php if (!empty($_SESSION['error_message'])) : ?>
              <?= $_SESSION['error_message'] ?>
            <?php endif; ?></div>
          <input type="submit" value="TAKE PART" class="btn btn-lg mt-4">
        </div>
      </div>

    </form>
</section>

<?php
require_once('./src/footer.php');
?>