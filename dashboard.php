<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <style>
  body {
    font-family: "Segoe UI", Arial, sans-serif;
    background: #f0f2f5;
    margin: 0;
    padding: 0;
  }

  nav {
    background: #1877f2;
    padding: 14px 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    border-radius: 0 0 12px 12px;
  }

  nav a {
    margin: 0 18px;
    font-size: 17px;
    text-decoration: none;
    color: #fff;
    font-weight: 500;
    position: relative;
    transition: color 0.3s ease;
  }

  nav a::after {
    content: "";
    position: absolute;
    bottom: -6px;
    left: 0;
    width: 0;
    height: 3px;
    background: #fff;
    border-radius: 3px;
    transition: width 0.3s ease;
  }

  nav a:hover {
    color: #ffdd57;
  }

  nav a:hover::after {
    width: 100%;
  }
</style>

</head>
<body>
  <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?> 👋</h2>
  <nav>
    <a href="project.php">Projects</a> |
    <a href="messages.php">Messages</a> |
    <a href="logout.php">Logout</a>
  </nav>
</body>
</html>
