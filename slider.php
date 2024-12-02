<?php
// Including database connection file
include 'db_config.php'; 

/* choosing any 3 movie for for carousel */

$carouselQuery = "SELECT id, slider_img, movie_title FROM movies_tb ORDER BY RAND() LIMIT 3";
$carouselResult = $conn->query($carouselQuery);

/* ad image  configuration */

$adQuery = "SELECT * FROM ads LIMIT 1";
$adResult = $conn->query($adQuery);
$adRow = $adResult->fetch_assoc();
?>


<!-- html content -->
<div class="container mt-4" style="max-width: 1500px; margin-left: 20px;">
    <div class="row">

        <div class="col-md-8">
            <div id="demo" class="carousel slide" data-ride="carousel">
                
                <!-- carousel arrow to change img -->
                <ul class="carousel-indicators">
                    <?php
                    if ($carouselResult->num_rows > 0) {
                        $index = 0;
                        while ($row = $carouselResult->fetch_assoc()) {
                            echo '<li data-target="#demo" data-slide-to="' . $index . '" ' . ($index === 0 ? 'class="active"' : '') . '></li>';
                            $index++;
                        }
                    }
                    ?>
                </ul>
                
                <!-- passing movie id then lnding user into the product page -->
                <h5>Popular movies</h5>


                <div class="carousel-inner">
                    <?php
                    if ($carouselResult->num_rows > 0) {
                        $active = true;
                        $carouselResult->data_seek(0);
                        while ($row = $carouselResult->fetch_assoc()) {
                            echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                            echo '<a href="product_page.php?id=' . $row['id'] . '">'; // Link to product page with movie id
                            echo '<img src="' . htmlspecialchars($row['slider_img']) . '" class="d-block w-100 img-fluid carousel-img" alt="' . htmlspecialchars($row['movie_title']) . '">';
                            echo '</a>';
                            echo '</div>';
                            $active = false;
                        }
                    } else {
                        echo '<p>No carousel images found.</p>';
                    }
                    ?>
                </div>
                
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>

        <!-- Ads Section  -->
        <div class="col-md-4 d-none d-md-block">
            <div class="ad-section">
                <?php
                if ($adRow) {
                    echo '<a href="' . htmlspecialchars($adRow['link_url']) . '">';
                    echo '<img src="' . htmlspecialchars($adRow['image_url']) . '" class="img-fluid" style="height: 100%; width: 100%; object-fit: cover;" alt="Ad Image">';
                    echo '</a>';
                } else {
                    echo '<p>No ads found.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for responsive behavior -->
<style>
   
    .carousel-img {
        max-height: 500px;
    }

    .ad-section {
        margin-top: 15px;
    }
    
    @media (max-width: 768px) {
        .carousel-img {
            max-height: 300px;
        }
    }

    /* Hide the ad section on screens smaller than 992px */
    @media (max-width: 991.98px) {
        .ad-section {
            display: none !important;
        }
    }
</style>

<?php
$conn->close();
?>
