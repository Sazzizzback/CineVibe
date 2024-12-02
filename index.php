<?php
session_start();

//showing message if login successful
if (isset($_SESSION['success_message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
    unset($_SESSION['success_message']); // Clear the message after displaying it
}



// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_email']);
?>




<script>
        // alert system to whether user is logged in or not

    function checkLogin(event) {
        <?php if (!$isLoggedIn): ?>
            event.preventDefault(); // Prevent the default action
            
            Swal.fire({
                title: "Access Restricted",
                text: "Please log in first to access this feature.",
                icon: "info",
                confirmButtonText: "Log In",
                confirmButtonColor: "#178115"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Heading to signin page
                    window.location.href = "signin.php";
                }
            });
        <?php endif; ?>
    }
</script>
<!-- including necessary php files -->

<?php include 'header.php'; ?>

<div onclick="checkLogin(event)"> <!-- checking login -->

    <?php include 'slider.php'; ?>
    <?php include 'content.php'; ?>
</div>

<?php include 'footer.php'; ?>
