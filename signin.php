<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="signin.css">
</head>
<body>

<?php
session_start(); 

if (isset($_SESSION['user_login_msg'])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['user_login_msg'] . "</div>";
    unset($_SESSION['user_login_msg']); // Clear the message after displaying it
}



if (isset($_SESSION['error_message'])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
    // unset for refreshing
    unset($_SESSION['error_message']);
}
if (isset($_SESSION['error_message2'])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error_message2'] . "</div>";
    // unset for refreshing
    unset($_SESSION['error_message2']);
}
if (isset($_SESSION['registration_message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['registration_message'] . "</div>";
    unset($_SESSION['registration_message']); // Clear the message after displaying it
}
?>



<div class="container">
    <div class="row login-container">
        <!-- bootstrap form for login -->
        <div class="col-md-6 order-md-1 order-2 login-form">
            <h2>Sign In</h2>
            <form action="login_process.php" method="post">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="eg: 1234@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="At least 8 characters" required>
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
            <div class="text-center mt-3">
                <a href="register.php">Don't have an account?</a><br>
                <a href="#">Forgot your password?</a>
            </div>
        </div>

        <!--adding side image in login  -->
        <div class="col-md-6 order-md-2 order-1 logo-section d-none d-md-flex">
    <img src="img/login-img.png" alt="login_img">
</div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php include 'footer.php'; ?>
<!-- Logo Section with Images Only -->

