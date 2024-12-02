<?php
session_start(); // Ensure session is started at the top of the page

include 'db_config.php'; // Ensure you have your database connection setup here

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) { // Changed from user_name to user_id for consistency
    die("You must be logged in to submit a review.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['movie_id'], $_POST['reviewer_name'], $_POST['rating'], $_POST['review_text'])) {
        $movie_id = (int) $_POST['movie_id'];
        $reviewer_name = htmlspecialchars($conn->real_escape_string($_POST['reviewer_name']));
        $rating = (int) $_POST['rating'];
        $review_text = htmlspecialchars($conn->real_escape_string($_POST['review_text']));
        $user_id = $_SESSION['user_id'];

        if ($rating >= 1 && $rating <= 5) {
            $sql = "INSERT INTO reviews_tb (user_id, movie_id, reviewer_name, rating, review_text, review_date) VALUES (?, ?, ?, ?, ?, NOW())";


            // Prepare and bind
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("iisis", $user_id, $movie_id, $reviewer_name, $rating, $review_text);
                if ($stmt->execute()) {
                    // Redirect with success message
                    header("Location: product_page.php?id=$movie_id&review=success");
                    exit;
                } else {
                    // Redirect with error message
                    header("Location: product_page.php?id=$movie_id&review=error");
                    exit;
                }
            } else {
                // SQL preparation error
                header("Location: product_page.php?id=$movie_id&review=error");
                exit;
            }
        } else {
            // Redirect with invalid rating message
            header("Location: product_page.php?id=$movie_id&review=invalid-rating");
            exit;
        }
    } 
    else {
        // Redirect if form fields are not filled in
        header("Location: product_page.php?id=$movie_id&review=missing-fields");
        exit;
    }
}
?>
