<!-- dashboard.php -->
<?php
session_start();

// Optional: check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: index.html"); // redirect to login page if not logged in
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
</head>
<body>
  <h1>Welcome to your dashboard, <?php echo $_SESSION['full_name']; ?>!</h1>
  <p>Your email: <?php echo $_SESSION['email']; ?></p>
  <a href="logout.php">Logout</a>
</body>
</html>
