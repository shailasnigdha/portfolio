<?php
$pageTitle = "Login — Shaila Akter";
include 'includes/header.php';
include 'includes/db.php';

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';

  $stmt = $conn->prepare("SELECT id, username, password FROM user WHERE username = ? LIMIT 1");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $res = $stmt->get_result();
  if ($res->num_rows === 1) {
    $user = $res->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['username'] = $user['username'];
      header("Location: index.php");
      exit;
    }
  }
  $error = "Invalid username or password.";
}
?>
<section class="auth">
  <h2 class="heading">Sign <span>In</span></h2>
  <?php if ($error): ?><p class="notice error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
  <form method="POST" class="auth-form">
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit" class="btn">Login</button>
  </form>
</section>
<?php include 'includes/footer.php'; ?>
