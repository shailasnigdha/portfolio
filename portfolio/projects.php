<?php
$pageTitle = "Projects — Shaila Akter";
include 'includes/header.php';
include 'includes/db.php';

// Fetch all projects (newest first)
$stmt = $conn->prepare("SELECT id, title, description, image, link FROM projects ORDER BY id DESC");
$stmt->execute();
$result = $stmt->get_result();
?>
<section class="project section">
  <h2 class="heading section-title"><i class="fa-solid fa-user-gear"></i> My <span>Projects</span></h2>

  <div class="project-filters">
    <span class="project-item active-project btn" data-filter="*">All</span>
    <span class="project-item btn" data-filter=".has-image">With Image</span>
    <span class="project-item btn" data-filter=".no-image">No Image</span>
  </div>

  <div class="project-container container grid" id="projects-grid">
    <?php if ($result->num_rows === 0): ?>
      <p>No projects yet. <?php if (!empty($_SESSION['username'])): ?><a href="add_project.php">Add your first project</a>.<?php endif; ?></p>
    <?php endif; ?>
    <?php while($row = $result->fetch_assoc()):
      $hasImage = !empty($row['image']);
      $cardClass = $hasImage ? 'mix has-image' : 'mix no-image';
      $imgPath = $hasImage ? 'uploads/' . htmlspecialchars($row['image']) : 'assets/images/avatar.jpg';
    ?>
      <div class="project-card <?= $cardClass ?>">
        <img src="<?= $imgPath ?>" alt="<?= htmlspecialchars($row['title']) ?>" class="project-img">
        <h3 class="project-title"><?= htmlspecialchars($row['title']) ?></h3>
        <?php if (!empty($row['link'])): ?>
          <a class="btn project-button" href="<?= htmlspecialchars($row['link']) ?>" target="_blank" rel="noopener">Demo</a>
        <?php endif; ?>
        <div class="portfolio-item-details">
          <h3 class="details-title"><?= htmlspecialchars($row['title']) ?></h3>
          <p class="details-description"><?= nl2br(htmlspecialchars($row['description'])) ?></p>
          <ul class="details-info">
            <?php if (!empty($row['link'])): ?>
              <li>View - <span><a href="<?= htmlspecialchars($row['link']) ?>" target="_blank">Open Link</a></span></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</section>

<!-- Popup shell reused by JS -->
<div class="project-popup">
  <div class="project-popup-inner">
    <div class="project-popup-content grid">
      <span class="project-popup-close"><i class="fa-solid fa-xmark"></i></span>
      <div class="pp-thumbnail">
        <img src="" alt="project" class="project-popup-img" />
      </div>
      <div class="project-popup-info">
        <div class="project-popup-subtitle">Featured - <span>Project</span></div>
        <div class="project-popup-body">
          <h3 class="details-title"></h3>
          <p class="details-description"></p>
          <ul class="details-info"></ul>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
