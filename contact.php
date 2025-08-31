


<?php
$pageTitle = "Contact — Shaila Akter";
include 'includes/header.php';
include 'includes/db.php';

$notice = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Collect and sanitize inputs
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $message = trim($_POST['message'] ?? '');

  // Validate inputs
  if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    if ($stmt) {
      $stmt->bind_param("sss", $name, $email, $message);
      if ($stmt->execute()) {
        $notice = "✅ Message sent successfully!";
      } else {
        $notice = "❌ Error saving your message: " . $stmt->error;
      }
      $stmt->close();
    } else {
      $notice = "❌ Database error: " . $conn->error;
    }
  } else {
    $notice = "⚠️ Please fill out all required fields with valid information.";
  }
}
?>

<section class="contact">
  <h2 class="heading"><i class="fa-regular fa-address-book"></i> Contact <span>Me</span></h2>

  <?php if ($notice): ?>
    <p class="notice"><?= htmlspecialchars($notice) ?></p>
  <?php endif; ?>

  <div class="contact-container container grid">
    <!-- Contact info cards -->
    <div class="contact-content">
      <div class="contact-card">
        <span class="contact-icon"><i class="fa-solid fa-map-location-dot"></i></span>
        <div class="contact-info">
          <h3 class="contact-title">Address</h3>
          <p class="contact-data">Rokeya Hall, KUET, Khulna</p>
        </div>
      </div>

      <div class="contact-card">
        <span class="contact-icon"><i class="fa-solid fa-envelope"></i></span>
        <div class="contact-info">
          <h3 class="contact-title">Email</h3>
          <p class="contact-data">shailasnigdha28@gmail.com</p>
        </div>
      </div>

      <div class="contact-card">
        <span class="contact-icon"><i class="fa-brands fa-whatsapp"></i></span>
        <div class="contact-info">
          <h3 class="contact-title">WhatsApp</h3>
          <p class="contact-data">01822817919</p>
        </div>
      </div>
    </div>

    <!-- Contact form -->
    <form method="POST" action="contact.php" class="contact-form">
      <div class="input-box">
        <input type="text" name="name" placeholder="Enter your name" required />
        <input type="email" name="email" placeholder="Email Address" required />
      </div>
      <textarea name="message" cols="30" rows="8" placeholder="Your Message" required></textarea>
      <button type="submit" class="btn">Send Message</button>
    </form>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
