<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$pageTitle = $pageTitle ?? "Shaila Akter Portfolio";
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($pageTitle) ?></title>

  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Montserrat+Alternates:wght@400;500;600;800&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header class="header">
    <a href="index.php" class="logo">Shaila</a>
    <i class="fa-solid fa-bars" id="menu-icon"></i>
    <nav class="navbar">
      <a href="index.php" class="<?= $current==='index.php'?'active':'' ?>">Home</a>
      <a href="about.php" class="<?= $current==='about.php'?'active':'' ?>">About</a>
      <a href="skills.php" class="<?= $current==='skills.php'?'active':'' ?>">Skills</a>
      <a href="projects.php" class="<?= $current==='projects.php'?'active':'' ?>">Projects</a>
      <a href="contact.php" class="<?= $current==='contact.php'?'active':'' ?>">Contact</a>
      <?php if (!empty($_SESSION['username'])): ?>
        <a href="add_project.php" class="<?= $current==='add_project.php'?'active':'' ?>">Add Project</a>
        <a href="logout.php">Logout (<?= htmlspecialchars($_SESSION['username']) ?>)</a>
      <?php else: ?>
        <a href="login.php" class="<?= $current==='login.php'?'active':'' ?>">Login</a>
      <?php endif; ?>
      <i class="fa-solid fa-gear settings" id="switcher-toggle"></i>
    </nav>
  </header>

  <main>
