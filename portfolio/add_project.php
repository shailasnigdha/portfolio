<?php
$pageTitle = "Add Project — Shaila Akter";
include 'includes/header.php';
include 'includes/db.php';

if (empty($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

$notice = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = trim($_POST['title'] ?? '');
  $description = trim($_POST['description'] ?? '');
  $link = trim($_POST['link'] ?? '');

  // File upload (optional)
  $imageName = "";
  if (!empty($_FILES['image']['name'])) {
    $dir = __DIR__ . "/uploads";
    if (!is_dir($dir)) mkdir($dir, 0777, true);

    $basename = time() . "_" . preg_replace("/[^A-Za-z0-9\.\-_]/", "_", $_FILES['image']['name']);
    $target = $dir . "/" . $basename;

    if (is_uploaded_file($_FILES['image']['tmp_name']) && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $imageName = $basename;
    } else {
      $notice = "Image upload failed (continuing without image).";
    }
  }

  if ($title && $description) {
    $stmt = $conn->prepare("INSERT INTO projects (title, description, image, link) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $description, $imageName, $link);
    if ($stmt->execute()) {
      $notice = "Project added successfully!";
    } else {
      $notice = "Error saving project.";
    }
  } else {
    $notice = "Title and Description are required.";
  }
}
?>
<section class="admin">
  <h2 class="heading">Add <span>Project</span></h2>
  <?php if ($notice): ?><p class="notice"><?= htmlspecialchars($notice) ?></p><?php endif; ?>
  <form method="POST" enctype="multipart/form-data" class="admin-form">
    <input type="text" name="title" placeholder="Project Title" required />
    <textarea name="description" rows="6" placeholder="Project Description" required></textarea>
    <input type="url" name="link" placeholder="Project Link (optional)" />
    <input type="file" name="image" accept="image/*" />
    <button type="submit" class="btn">Save Project</button>
  </form>
</section>
<?php include 'includes/footer.php'; ?>
