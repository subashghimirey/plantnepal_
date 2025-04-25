<?php session_start(); if (!isset($_SESSION['user'])) header('Location: login.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - Treedom</title>
</head>
<body>
  <h2>Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?>!</h2>
  <p>This is your dashboard. 🌿</p>
  <a href="logout.php">Logout</a>
</body>
</html>
