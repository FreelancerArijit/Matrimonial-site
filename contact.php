<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ShadiWadi.com</title>
  <!-- Bootstrap 4.6 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/custom.css">
  <link rel="icon" type="image/png" href="images/favicon.jpg" sizes="20x20">

  <style>
    
   
  </style>
</head>
<body>
    <?php include_once('./components/header.php'); ?>

<section class="contact-section">
  <div class="container">
    <!-- Section Header -->
    <div class="section-header">
      <h2>Contact Us</h2>
      <p>We’d love to hear from you! Fill out the form and we’ll respond soon.</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="contact-form">
          
        
          <!-- Contact Form -->
          <form>
            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" id="name" placeholder="Your Name">
            </div>
            <div class="form-group">
              <label for="email">Your Email Address</label>
              <input type="email" class="form-control" id="email" placeholder="Your Email">
            </div>
            
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" rows="5" placeholder="Your message here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include_once('./components/footer.php'); ?>

<!-- Bootstrap 4.6 JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>