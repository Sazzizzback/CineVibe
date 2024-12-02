<?php
session_start();
include 'db_config.php'; 

if (isset($_SESSION['user_id']) && isset($_POST['movie_id'])) {
    $user_id = $_SESSION['user_id'];  
    $movie_id = $_POST['movie_id'];

    // firstly checking if the movie is already in the wishlist
    $checkSql = "SELECT * FROM wishlist_tb WHERE user_id = ? AND movie_id = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("ii", $user_id, $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "This movie is already in your wishlist.";
    } else {
        // insert movie into wishlist if not already added
        $insertSql = "INSERT INTO wishlist_tb (user_id, movie_id) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("ii", $user_id, $movie_id);

        if ($insertStmt->execute()) {
            echo "Movie added to wishlist!";
        } else {
            echo "Error adding movie to wishlist.";
        }
        $insertStmt->close();
    }
    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
