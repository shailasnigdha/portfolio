<?php 
include '../includes/db.php';
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit();
}

// Fetch data
$contacts = $conn->query("SELECT * FROM contact ORDER BY created_ar DESC");
$projects = $conn->query("SELECT * FROM projects ORDER BY created_ar DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="sidebar">
  <h2>⚡ Admin</h2>
  <a href="dashboard.php">📊 Dashboard</a>
  <a href="projects.php">💻 Projects</a>
  <a href="messages.php">📬 Messages</a>
  <a href="add_project.php">➕ Add Project</a>
  <a href="logout.php" class="logout">🚪 Logout</a>
</div>

<div class="main-content">
  <div class="dashboard-container">
      <h1>Admin Dashboard</h1>

      <div class="dashboard-cards">
          <div class="dashboard-card">
              <h2>📬 Messages</h2>
              <table>
                  <tr>
                      <th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Date</th>
                  </tr>
                  <?php while($row = $contacts->fetch_assoc()): ?>
                  <tr>
                      <td><?= $row['id'] ?></td>
                      <td><?= htmlspecialchars($row['name']) ?></td>
                      <td><?= htmlspecialchars($row['email']) ?></td>
                      <td><?= htmlspecialchars($row['message']) ?></td>
                      <td><?= $row['created_ar'] ?></td>
                  </tr>
                  <?php endwhile; ?>
              </table>
          </div>

          <div class="dashboard-card">
              <h2>💻 Projects</h2>
              <table>
                  <tr>
                      <th>ID</th><th>Title</th><th>Description</th><th>Image</th><th>Link</th><th>Date</th>
                  </tr>
                  <?php while($row = $projects->fetch_assoc()): ?>
                  <tr>
                      <td><?= $row['id'] ?></td>
                      <td><?= htmlspecialchars($row['title']) ?></td>
                      <td><?= htmlspecialchars($row['description']) ?></td>
                      <td>
                          <?php if(!empty($row['image'])): ?>
                              <img src="../uploads/<?= htmlspecialchars($row['image']) ?>" width="50">
                          <?php endif; ?>
                      </td>
                      <td>
                          <?php if(!empty($row['link'])): ?>
                              <a href="<?= htmlspecialchars($row['link']) ?>" target="_blank">🔗</a>
                          <?php endif; ?>
                      </td>
                      <td><?= $row['created_ar'] ?></td>
                  </tr>
                  <?php endwhile; ?>
              </table>
              <a class="btn-primary" href="add_project.php">➕ Add New Project</a>
          </div>
      </div>
  </div>
</div>

</body>
</html>
