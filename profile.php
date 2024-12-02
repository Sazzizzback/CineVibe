<?php
session_start();
include 'header.php'; // Includes page header.
include 'db_config.php'; // Connects to the database.

// Redirects to login if user is not logged in.
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetches user information from the database.
$userQuery = $conn->prepare("SELECT first_name, email FROM users WHERE id = ?");
$userQuery->bind_param("i", $user_id);
$userQuery->execute();
$userResult = $userQuery->get_result();
$user = $userResult->fetch_assoc();

// Fetches reviews and associated movie titles for the logged-in user.
$reviewsQuery = $conn->prepare("
    SELECT r.reviewer_name, r.review_text, r.rating, r.review_date, m.movie_title 
    FROM reviews_tb AS r
    INNER JOIN movies_tb AS m ON r.movie_id = m.id
    WHERE r.user_id = ? 
    ORDER BY r.review_date DESC
");
$reviewsQuery->bind_param("i", $user_id);
$reviewsQuery->execute();
$reviewsResult = $reviewsQuery->get_result();

// Processes profile updates or password changes submitted by the user.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_info'])) {
        $new_username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $new_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        if (filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
            $updateQuery = $conn->prepare("UPDATE users SET first_name = ?, email = ? WHERE id = ?");
            $updateQuery->bind_param("ssi", $new_username, $new_email, $user_id);
            $updateQuery->execute();
            echo "<div class='alert alert-success'>Profile updated successfully.</div>";
            $updateQuery->close();
        } else {
            echo "<div class='alert alert-danger'>Invalid Email Address.</div>";
        }
    }

    if (isset($_POST['update_password'])) {
        $new_password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($new_password === $confirm_password && strlen($new_password) >= 6) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $updatePasswordQuery = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $updatePasswordQuery->bind_param("si", $hashed_password, $user_id);
            $updatePasswordQuery->execute();
            echo "<div class='alert alert-success'>Password updated successfully.</div>";
            $updatePasswordQuery->close();
        } else {
            echo $new_password !== $confirm_password ? "<div class='alert alert-danger'>Passwords do not match.</div>" : "<div class='alert alert-danger'>Password must be at least 6 characters long.</div>";
        }
    }
}

$userQuery->execute(); // Refresh user data.
$user = $userQuery->get_result()->fetch_assoc();
?>

<style>
    body { font-family: Arial, sans-serif; }
    .profile-info, .reviews-section, .password-change { margin-top: 20px; padding: 15px; background-color: #f4f4f4; border-radius: 5px; }
    .star-rating { color: #ffc107; }
    button { background-color: #007bff; color: white; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer; }
    button:hover { background-color: #0056b3; }
    input[type="text"], input[type="email"], input[type="password"] { width: 100%; padding: 10px; margin-top: 5px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; }
    .card { background-color: #fff; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 20px; }
    .card-body { padding: 20px; }
    label { font-weight: bold; margin-top: 10px; }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <br>
            <h1>User Profile</h1>
            <div class="profile-info">
                <form method="post">
                    <label>Username:</label>
                    <input type="text" name="username" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    <button type="submit" name="update_info">Update Info</button>
                </form>
            </div>
            <div class="password-change">
                <form method="post">
                    <label>New Password:</label>
                    <input type="password" name="password" required>
                    <label>Confirm New Password:</label>
                    <input type="password" name="confirm_password" required>
                    <button type="submit" name="update_password">Update Password</button>
                </form>
            </div>
            <div class="reviews-section">
                <h3>Your Reviews</h3>
                <?php while ($review = $reviewsResult->fetch_assoc()) { ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <strong><?php echo htmlspecialchars($review['reviewer_name']); ?></strong>
                                <p class="mb-0 ml-3 star-rating"><?php for ($i = 0; $i < $review['rating']; $i++) echo "&#9733;"; ?></p>
                            </div>
                            <h5><?php echo htmlspecialchars($review['movie_title']); ?></h5>
                            <p><?php echo htmlspecialchars($review['review_text']); ?></p>
                            <small>Reviewed on: <?php echo date("F j, Y", strtotime($review['review_date'])); ?></small>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
$reviewsQuery->close();
$conn->close();
include 'footer.php';
?>
