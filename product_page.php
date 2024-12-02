<?php


if (isset($_GET['review'])) {
    $review_status = $_GET['review'];

    switch ($review_status) {
        case 'success':
            echo "<div class='alert alert-success'>Thank you! Your review has been submitted successfully.</div>";
            break;
        case 'error':
            echo "<div class='alert alert-danger'>Oops! Something went wrong while submitting your review. Please try again later.</div>";
            break;
        case 'invalid-rating':
            echo "<div class='alert alert-danger'>Don’t forget to rate! Please choose at least one star.</div>";
            break;
        case 'missing-fields':
            echo "<div class='alert alert-danger'>All fields are required to submit a review. Please fill them out and try again.</div>";
            break;
        default:
            //  handle any other unexpected situation
            echo "<div class='alert alert-info'>Unexpected error. Please try again.</div>";
            break;
    }
}

?>
<?php
session_start(); // Start session to access logged-in user's data
if (!isset($_SESSION['user_id'])) {

    $_SESSION['user_login_msg'] = "please login first to watch";

    //if  user is not logged in, redirect to signin.php
    header("Location: signin.php");
    exit; // no further code is executed
}

include 'header.php';
// Including database connection file

include 'db_config.php'; 




// Get movie ID from URL
$movie_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch movie details
$sql = "SELECT * FROM movies_tb WHERE id = $movie_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $movie = $result->fetch_assoc();
?>

<div class="container mt-4">
    <div class="row">
        <!-- Movie Image and Details -->
        <div class="col-md-8">
            <div class="card mb-3" style="height: 400px;">
                <img src="<?php echo htmlspecialchars($movie['slider_img']); ?>" class="card-img-top h-100" alt="<?php echo htmlspecialchars($movie['movie_title']); ?>" style="object-fit: cover;">
            </div>

            <div class="bg-light p-3 mb-3">
    <h5><?php echo htmlspecialchars($movie['movie_title']); ?></h5>
    <p><?php echo htmlspecialchars($movie['description']); ?></p>
    <button class="btn btn-secondary wishlist-btn" onclick="wishlistprocess(<?php echo $movie_id; ?>);">
    Add to Wishlist
</button>

            <a href="#" class="btn btn-success">Watch Now</a>
        </div>
        </div>

        <!-- Movie Details -->
        <div class="col-md-4">
            <div class="row mb-3">
                <div class="col-md-8">
                    <p><strong>Director:</strong> <?php echo htmlspecialchars($movie['director']); ?></p>
                    <p><strong>Genre:</strong> <?php echo htmlspecialchars($movie['genre']); ?></p>
                    <p><strong>Publisher:</strong> <?php echo htmlspecialchars($movie['publisher']); ?></p>
                </div>
                <div class="col-md-4 text-center bg-light p-3">
                    <i class="fa fa-eye" style="font-size: 24px;"></i>
                    <p><strong><?php echo htmlspecialchars($movie['watch_times']); ?></strong> times Watched</p>
                </div>
            </div>

            <!-- Reviews Section -->
            <h6>Reviews</h6>
            <?php
            // Fetch reviews for this movie
            $reviewSql = "SELECT * FROM reviews_tb WHERE movie_id = $movie_id ORDER BY review_date DESC";
            $reviewResult = $conn->query($reviewSql);

            if ($reviewResult->num_rows > 0) {
                while ($review = $reviewResult->fetch_assoc()) {
            ?>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <strong><?php echo htmlspecialchars($review['reviewer_name']); ?></strong>
                        <p class="mb-0 ml-3 text-warning">
                            <?php for ($i = 0; $i < $review['rating']; $i++) echo "&#9733;"; ?>
                        </p>
                    </div>
                    <p><?php echo htmlspecialchars($review['review_text']); ?></p>
                    <small class="text-muted"><?php echo date("F j, Y", strtotime($review['review_date'])); ?></small>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<p>No reviews yet. Be the first to review this movie!</p>";
            }
            ?>

            <!-- Review Form -->
            <div class="bg-light p-3 mt-4">
    <h6>Leave a Review</h6>
    <form action="submit_review.php" method="post" id="reviewForm">
       <!-- User's Name (auto entry) -->
       <div class="form-group mb-3">
    <label for="reviewerName">Name</label>
    <input type="text" class="form-control" id="reviewerName" name="reviewer_name" 
           value="<?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : ''; ?>" 
           placeholder="Enter your name" readonly>
</div>

    <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">

                    
                        <!--star form  -->
                    <div class="form-group mb-3">
    <label for="rating">Rating</label>
    <div class="rating" id="starRating">
        <span class="star" data-value="1">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="5">&#9733;</span>
    </div>
    <input type="hidden" name="rating" id="ratingValue" value="0" />
</div>

<!-- css for this page -->
<style>
    .star {
        font-size: 40px; 
        cursor: pointer;
    }

    .text-warning {
        color: #ffcc00; 
    }
</style>

<!-- adding required javasript -->
<script>
    const stars = document.querySelectorAll('.star');
    const ratingValue = document.getElementById('ratingValue');

    stars.forEach(star => {
        star.addEventListener('mouseenter', function () {
            const value = this.getAttribute('data-value');
            stars.forEach(star => {
                star.classList.remove('text-warning');
            });
            for (let i = 0; i < value; i++) {
                stars[i].classList.add('text-warning');
            }
        });

        star.addEventListener('mouseleave', function () {
            const value = ratingValue.value;
            stars.forEach(star => {
                star.classList.remove('text-warning');
            });
            for (let i = 0; i < value; i++) {
                stars[i].classList.add('text-warning');
            }
        });

        star.addEventListener('click', function () {
            const value = this.getAttribute('data-value');
            ratingValue.value = value;
            stars.forEach(star => {
                star.classList.remove('text-warning');
            });
            for (let i = 0; i < value; i++) {
                stars[i].classList.add('text-warning');
            }
        });
    });


    //script for wishlist 

    function wishlistprocess(movieId) {
    $.ajax({
        url: 'wishlistprocess.php',
        type: 'POST',
        data: {movie_id: movieId},
        success: function(response) {
            alert(response);
        },
        error: function() {
            alert('Error adding to wishlist.');
        }
    });
}

    


</script>


                    <!-- review text -->
                    <div class="form-group mb-3">
                        <label for="reviewText">Review</label>
                        <textarea class="form-control" id="reviewText" name="review_text" rows="3" required></textarea>
                    </div>

                  
                    <button type="submit" class="btn btn-success">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

} else {
    echo "<p>Movie not found.</p>";
}

$conn->close();
include 'footer.php';
?>
