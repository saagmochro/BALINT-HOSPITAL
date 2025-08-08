<?php
// Database connection settings
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $full_name = $_POST["Full names"];
  $phone = $_POST["phone number"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $password = $_POST["password"];
  $confirm_password = $_POST["Confirm password"];

  if ($password !== $confirm_password) {
    echo "Passwords do not match!";
    exit();
  }

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO users (full_name, phone, email, gender, password) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $full_name, $phone, $email, $gender, $hashed_password);

  if ($stmt->execute()) {
    // Redirect after successful registration
    header("Location: login form.php");
    exit();
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
?>
