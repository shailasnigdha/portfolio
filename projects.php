<?php
$pageTitle = "Projects — Shaila Akter";
include 'includes/header.php';
include 'includes/db.php';

// Fetch all projects (newest first)
$stmt = $conn->prepare("SELECT id, title, description, image, link FROM projects ORDER BY id DESC");
$stmt->execute();
$result = $stmt->get_result();
?>
<section class="project section" id="project">
  <h2 class="heading section-title">
    <i class="fa-solid fa-user-gear"></i> My <span>Projects</span>
  </h2>

  <!-- Add Project Button -->
  <div style="margin-bottom:20px;">
    <a href="add_project.php" class="btn">➕ Add Project</a>
  </div>

  <div class="project-container container grid" id="projects-grid">
    <?php if ($result->num_rows === 0): ?>
      <p>No projects yet. <a href="add_project.php">Add your first project</a>.</p>
    <?php endif; ?>

    <?php while($row = $result->fetch_assoc()):
      $hasImage = !empty($row['image']);
      $imgPath = $hasImage ? 'assets/' . htmlspecialchars($row['image']) : 'assets/default.jpg';
    ?>
      <div class="project-card">
        <img src="<?= $imgPath ?>" alt="<?= htmlspecialchars($row['title']) ?>" class="project-img">
        <h3 class="project-title"><?= htmlspecialchars($row['title']) ?></h3>

        <!-- Read More button instead of direct link -->
        <button class="btn project-button">Read More</button>

        <!-- Hidden details for popup -->
        <div class="portfolio-item-details">
          <h3 class="details-title"><?= htmlspecialchars($row['title']) ?></h3>
          <p class="details-description"><?= nl2br(htmlspecialchars($row['description'])) ?></p>
          <?php if (!empty($row['link'])): ?>
            <p>View: <a href="<?= htmlspecialchars($row['link']) ?>" target="_blank">Open Link</a></p>
          <?php endif; ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</section>

<!-- Project Popup -->
<div class="project-popup">
  <div class="project-popup-inner">
    <span class="project-popup-close">&times;</span>
    <div class="project-popup-content">
      <div class="pp-thumbnail">
        <img src="" alt="Project Image" class="project-popup-img">
      </div>
      <div class="project-popup-info">
        <h3 class="project-popup-subtitles"><span></span></h3>
        <div class="project-popup-body"></div>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
