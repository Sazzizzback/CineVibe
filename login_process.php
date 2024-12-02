<?php
session_start(); // starting the session

// Including database connection file
include 'db_config.php'; 



// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

// Query to check if email exists
$stmt = $conn->prepare("SELECT id, password, first_name FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {

    $stmt->bind_result($user_id, $hashed_password, $first_name);
    $stmt->fetch();
    
    // Verify the password
    if (password_verify($password, $hashed_password)) {
        // Set session variables upon successful login
        $_SESSION['user_id'] = $user_id; // Use 'id' as the column name here
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $first_name; // Store the user's first name
        $_SESSION['success_message'] = "Login successful"; // Add a success message
        
        // heading  to index.php
        header("Location: index.php");
        exit; 
    } else {
        $_SESSION['error_message'] = "Invalid  password";
        
        header("Location: signin.php");
        exit;
    }
} else {
    $_SESSION['error_message2'] = "No user found with that email.";
    header("Location: signin.php");
}

// Close the statement and connection
$stmt->close();
$conn->close();

?>
