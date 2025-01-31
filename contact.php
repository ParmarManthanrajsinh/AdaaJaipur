<?php
include 'header.php';
include 'functions.php';
?>

<section class="contact-section">
  <div class="container">
    <h1>Get in Touch</h1>
    <p class="contact-intro">We'd love to hear from you! For inquiries, feedback, or support, please reach out to us using the form below or through the contact details provided.</p>

    <div class="contact-details">
      <div class="contact-item">
        <i class="fas fa-map-marker-alt"></i>
        <p>123 Fashion Street, Jaipur, Rajasthan, India</p>
      </div>
      <div class="contact-item">
        <i class="fas fa-phone"></i>
        <p><a href="tel:+911234567890">+91 1234567890</a></p>
      </div>
      <div class="contact-item">
        <i class="fas fa-envelope"></i>
        <p><a href="mailto:support@adaajaipur.com">support@adaajaipur.com</a></p>
      </div>
    </div>

    <div class="contact-form">
      <h2>Send us a Message</h2>
      <form action="#" method="post">
        <div class="form-group">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label for="email">Your Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="7" placeholder="Write your message here..." required></textarea>
        </div>
        <button type="submit" class="submit-btn">Send Message</button>
      </form>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
