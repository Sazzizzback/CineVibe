<?php include 'header.php'; ?>

<?php
// Including database connection file
include 'db_config.php';

$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Check if search query is empty
if (empty($search)) {
    die("Search parameter is required");
}

// Prepare SQL query to search for the movie title in the movies_tb table
$sql = "SELECT * FROM movies_tb WHERE movie_title LIKE ?";

$stmt = $conn->prepare($sql);
$searchTerm = '%' . $search . '%'; // Use wildcards for partial matching
$stmt->bind_param("s", $searchTerm);

$stmt->execute();
$result = $stmt->get_result();
?>

<style>
    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .card-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .card {
        height: 100%;
    }
    .movie-card {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .btn-success {
        width: 100%;
    }
</style>

<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4">Search Results for "<?php echo htmlspecialchars($search); ?>"</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Search Results</li>
                </ol>
            </nav>
        </div>
    </div>

    <?php if ($result->num_rows > 0) { ?>
        <!-- Movies Grid -->
        <div class="container-fluid mt-4">
            <div class="row justify-content-center mx-1">
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="card mb-4 movie-card">
                            <img src="<?php echo htmlspecialchars($row['card_img']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['movie_title']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['movie_title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars(substr($row['description'], 0, 100)); ?>...</p>
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
            <p>Sorry, no results match your search for "<?php echo htmlspecialchars($search); ?>".</p>
            <hr>
            <p class="mb-0">Try searching with a different keyword or check back later.</p>
        </div>
    <?php } ?>

    <?php include 'footer.php'; ?>
</div>

<?php
// Close connections
$stmt->close();
$conn->close();
?>
