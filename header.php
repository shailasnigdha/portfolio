<?php $active=$_GET['page']??'about'; ?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?php echo e($SITE['title']); ?></title><link rel="stylesheet" href="assets/css/style.css"><script defer src="assets/js/app.js"></script></head><body>
<header class="topbar"><div class="container topbar-inner"><div class="brand"><div class="brand-name"><?php echo e($SITE['name']); ?></div><div class="brand-role"><?php echo e($SITE['role']); ?></div></div>
<nav class="tabs"><a class="tab <?php echo $active==='about'?'active':'';?>" href="index.php?page=about">About</a><a class="tab <?php echo $active==='resume'?'active':'';?>" href="index.php?page=resume">Resume</a><a class="tab <?php echo $active==='portfolio'?'active':'';?>" href="index.php?page=portfolio">Portfolio</a><a class="tab <?php echo $active==='contact'?'active':'';?>" href="index.php?page=contact">Contact</a></nav></div></header>
