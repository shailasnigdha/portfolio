<?php
session_start();
include __DIR__ . '/includes/db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $github_link = $_POST['link'];

    // Image Upload
    $imageName = "";
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = __DIR__ . '/../assets/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imageName = time() . "_" . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imageName = $imageName;
        } else {
            $message = "⚠️ Image upload failed.";
        }
    }

    // Insert into DB
    if ($title && $description) {
        $stmt = $conn->prepare("INSERT INTO projects (title, description, image, link) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $description, $imageName, $link);

        if ($stmt->execute()) {
            $message = "✅ Project added successfully!";
        } else {
            $message = "❌ Database error: " . $conn->error;
        }
    } else {
        $message = "⚠️ Title and description are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Project</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <h2>Add New Project</h2>
  <?php if ($message) echo "<p>$message</p>"; ?>

  <form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Project Title" required><br><br>
    <textarea name="description" placeholder="Project Description" required></textarea><br><br>
    <input type="text" name="link" placeholder="Github Link"><br><br>
    <input type="file" name="image" accept="image/*"><br><br>
    <button type="submit">Save Project</button>
  </form>

  <br>
  <a href="projects.php">⬅ Back to Projects</a>
</body>
</html>