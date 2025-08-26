<?php require __DIR__ . '/config.php'; require __DIR__ . '/inc/functions.php'; 
$allowed=['about','resume','portfolio','contact']; $page=$_GET['page']??'about'; if(!in_array($page,$allowed,true)) $page='404';
require __DIR__ . '/inc/header.php'; ?>
<div class="layout container">
  <?php require __DIR__ . '/inc/sidebar.php'; ?>
  <main class="content">
    <?php include __DIR__ . "/pages/{$page}.php"; ?>
  </main>
</div>
<?php require __DIR__ . '/inc/footer.php'; ?>
