<?php
session_start();

// Including database connection file
include 'db_config.php'; 





// post Form data
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validation: check if passwords match
if ($password !== $confirm_password) {
    echo "Passwords do not match!";
    exit;
}

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (first_name, middle_name, last_name, email, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $first_name, $middle_name, $last_name, $email, $hashed_password);

// Execute the statement
if ($stmt->execute()) {
 $_SESSION['registration_message'] = "Registration successful!";
    header("Location: signin.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
