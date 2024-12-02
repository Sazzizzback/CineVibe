<?php include 'header.php'; ?>

<?php
// Including database connection file
include 'db_config.php'; 


// Get genre from URL parameter and sanitize it
$genre = isset($_GET['genre']) ? $conn->real_escape_string($_GET['genre']) : '';

if (empty($genre)) {
    die("Genre parameter is required");
}

// Prepare SQL query for your movies_tb table based on the selected genre
$sql = "SELECT * FROM movies_tb WHERE genre = ?";

// Prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $genre);

// Execute query
$stmt->execute();
$result = $stmt->get_result();
?>

<style>
    /* Set uniform image dimensions */
    .card-img-top {
        width: 100%;          
        height: 200px;      
        object-fit: cover;    
    }

    /* Adjust column layout for responsiveness */
    .row {
        margin-left: 5px;      
        margin-right: 5px;     
    }

    /* Custom card text truncation for description */
    .card-text {
        display: -webkit-box;                
        -webkit-box-orient: vertical;        
        -webkit-line-clamp: 3;             
        line-clamp: 3;                      
        overflow: hidden;                    
        text-overflow: ellipsis;      
    }       

    /* Make sure cards are sized appropriately */
    .card {
        height: 100%;           
    }

    /* Ensuring uniform layout across all screen sizes */
    .movie-card {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    /* Styling for the Watch Now button */
    .btn-success {
        width: 100%;
    }
</style>

<div class="container">
    <!-- Genre Header -->
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4"><?php echo htmlspecialchars($genre); ?> Movies</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo htmlspecialchars($genre); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <?php if ($result->num_rows > 0) { ?>
        <!-- Movies Grid -->
        <div class="container-fluid mt-4">
            <div class="row justify-content-center mx-1">
                <?php
                // Check if there are results for the specific genre
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-md-3 col-sm-6 col-12"> <!-- Adjusted column class for responsiveness -->
                        <div class="card mb-4 movie-card">
                            <img src="<?php echo htmlspecialchars($row['card_img']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['movie_title']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['movie_title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars(substr($row['description'], 0, 100)); ?>...</p> <!-- Truncate description for a cleaner display -->
                                <a href="product_page.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Watch Now</a>
                            </div>
                        </div>
                    </div>
                <?php 
                }
                ?>
            </div>
        </div>
    <?php } else { ?>
        <!-- No Movies Found Message -->
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">No Movies Found!</h4>
            <p>Sorry, there are no movies available in the <?php echo htmlspecialchars($genre); ?> genre at the moment.</p>
            <hr>
            <p class="mb-0">Try searching for a different genre or check back later for updates.</p>
        </div>
    <?php } ?>

    <?php include 'footer.php'; ?>

</div>

<?php
// Close connections
$stmt->close();
$conn->close();
?>
