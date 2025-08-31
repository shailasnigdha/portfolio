<?php 
$pageTitle = "About — Shaila Akter"; 
include 'includes/header.php'; 
?>
<section class="about">
  <div class="about-img">
    <img src="assets/avatar.jpg" alt="profile picture">
  </div>
  <div class="about-content">
    <h2 class="heading">About <span>Me</span></h2>
    <h3>Full Stack Developer</h3>
    <p>I love creating beautiful and functional web applications with modern technologies.</p>
    <!-- IMPORTANT: add an id so JS can find this button -->
    <a href="#" class="btn" id="open-about-modal">Read more</a>
  </div>
</section>

<!-- Floating Tab (Modal) -->
<div class="modal" id="about-modal">
  <div class="modal-content">
    <span class="close-btn" id="close-modal">&times;</span>
    <h2>More About Me</h2>
    <p>
      I have experience in PHP, JavaScript and modern frameworks. I enjoy solving problems,
      building responsive UIs and learning new technologies. Beyond coding, I’m a strong
      collaborator and always improving my craft.I value clean design, problem-solving and 
      continuous learning. My goal is to grow as a developer who can bridge creativity with
      technology and delivering impactful solutions that are functional, efficient and 
      user-friendly.
    </p>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
