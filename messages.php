<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<?php
$pageTitle = "Messages - Shaila Akter";
include 'includes/db.php';

// Fetch all messages
$sql = "SELECT id, name, email, message, created_at FROM contacts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<section class="dashboard">
  <h2 class="heading"><i class="fa-solid fa-inbox"></i> Inbox <span>Messages</span></h2>

  <div class="dashboard-container">
    <?php if ($result && $result->num_rows > 0): ?>
      <table class="dashboard-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['id']) ?></td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
              <td><?= htmlspecialchars($row['created_at']) ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p class="notice">No messages yet.</p>
    <?php endif; ?>
  </div>
</section>

<footer class="footer">
  <div class="footer-text">
    <p>&copy; <?= date('Y') ?> Shaila Akter | All rights reserved.</p>
  </div>
  <div class="footer-iconTop">
    <a href="#"><i class="fa-solid fa-angle-up"></i></a>
  </div>
</footer>
