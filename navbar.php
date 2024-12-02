<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isLoggedIn = isset($_SESSION['user_email']);
?>
<!-- styling/css for navigation bar to make it mobile responsive as well -->
<style>
    
    .navbar-custom {
        background-color: #31473A;
        padding: 10px 20px;
        position: relative;
        display: flex;
        align-items: center;
    }

    .navbar-brand-container {
        display: flex;
        align-items: center;
    }

    .navbar-brand img {
        border-radius: 50%;
        width: 50px;
        height: 50px;
        margin-right: 15px; 
    }

    .three-dot-menu {
        display: none;
        cursor: pointer;
        color: #FEFEFE;
        font-size: 24px;
        margin-left: auto; 
    }

    
    @media (max-width: 768px) {
        .three-dot-menu {
            display: block;
        }
    }

    .navbar-nav {
        display: flex;
        gap: 0; 
    }

    .navbar-nav .nav-link {
        color: #FEFEFE;
        font-weight: bold;
        margin-right: 0;
        padding: 0 10px; 
    }

    .btn-group {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-left: auto; 
    }

    .search-group {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .form-control {
        height: 35px;
        border-radius: 4px;
        padding: 0 10px;
    }

    .btn-custom,
    .nav-link.auth-link {
        height: 35px;
        padding: 0 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #2b7e18;
        color: #FFFFFF;
        border: none;
        border-radius: 4px;
        font-weight: bold;
        font-size: 14px;
        text-decoration: none;
        white-space: nowrap;
    }

    .nav-link.auth-link {
        background-color: transparent;
        border: 1px solid #2b7e18;
    }

    .mobile-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #31473A;
        width: 200px;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        z-index: 1000;
    }

    .mobile-menu.active {
        display: block;
    }

    .mobile-menu .nav-link {
        display: block;
        padding: 10px;
        color: #FEFEFE;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .main-nav {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .navbar-brand img {
            width: 40px;
            height: 40px;
        }

        .navbar-custom {
            padding: 8px 15px;
        }

        .btn-group {
            gap: 5px;
        }

        .form-control {
            width: 100px;
            height: 30px;
            font-size: 13px;
        }

        .btn-custom,
        .nav-link.auth-link {
            height: 30px;
            padding: 0 10px;
            font-size: 13px;
        }
    }

    @media (max-width: 576px) {
        .navbar-brand img {
            width: 30px;
            height: 30px;
        }

        .form-control {
            width: 80px;
            font-size: 12px;
        }

        .btn-custom,
        .nav-link.auth-link {
            padding: 0 8px;
            font-size: 12px;
        }
    }
</style>

<!-- drop down funcanility -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <div class="navbar-brand-container">
            <a class="navbar-brand" href="#">
                <img src="img\logo1.png" alt="Logo">
            </a>
            <div class="three-dot-menu">⋮</div>
        </div>

        <!-- nav bar main -->
        <ul class="navbar-nav flex-row me-auto main-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Popular Movies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">New Arrivals</a>
            </li>
            
          
            <!-- Genre dropdown and mywishlist menu are shown only if the user is logged in -->
            <?php if ($isLoggedIn): ?>
                <li class="nav-item">
                <a class="nav-link" href="mywishlist.php">My Wishlist</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="genreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Genre
                </a>
                <div class="dropdown-menu" aria-labelledby="mobileGenreDropdown">
                    <a class="dropdown-item" href="filter.php?genre=Action">Action</a>
                    <a class="dropdown-item" href="filter.php?genre=Comedy">Comedy</a>
                    <a class="dropdown-item" href="filter.php?genre=Crime">Crime</a>
                    <a class="dropdown-item" href="filter.php?genre=Adventure">Adventure</a>
                    <a class="dropdown-item" href="filter.php?genre=Romance">Romance</a>
                    <a class="dropdown-item" href="filter.php?genre=Sci-Fi">Sci-Fi</a>
                </div>
            </li>
            <?php endif; ?>
        </ul>

        <!-- making 3 dot menu for making mobile responsiveness (side menu bar) -->
        <div class="mobile-menu">
            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="#">Popular Movies</a>
            <a class="nav-link" href="#">New Arrivals</a>
            <a class="nav-link" href="#">My Wishlist</a>
            
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="mobileGenreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Genre
                </a>
                <div class="dropdown-menu" aria-labelledby="mobileGenreDropdown">
                    <a class="dropdown-item" href="filter.php?genre=Action">Action</a>
                    <a class="dropdown-item" href="filter.php?genre=Comedy">Comedy</a>
                    <a class="dropdown-item" href="filter.php?genre=Crime">Crime</a>
                    <a class="dropdown-item" href="filter.php?genre=Adventure">Adventure</a>
                    <a class="dropdown-item" href="filter.php?genre=Romance">Romance</a>
                    <a class="dropdown-item" href="filter.php?genre=Sci-Fi">Sci-Fi</a>

                </div>
            </div>
        </div>

        <div class="btn-group">
            <div class="search-group">
                <input class="form-control" id="searchInput" type="search" placeholder="Search" aria-label="Search">
                <button class="btn-custom" id="searchButton" type="submit">Search</button>
            </div>
            
            <?php if ($isLoggedIn): ?>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="img\profile.png" alt="Profile" class="rounded-circle" width="30">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </div>
            <?php else: ?>
                <a class="nav-link auth-link" href="signin.php">Sign In</a>
                <a class="btn-custom" href="register.php">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<script>
    //three dot menu
    $(document).ready(function() {
    $('.three-dot-menu').click(function() {
        $('.mobile-menu').toggleClass('active');
    });
});

//for performing search button because form tag break the layout
const searchButton = document.getElementById('searchButton');
    const searchInput = document.getElementById('searchInput');
//creating function called perform seearch
    function performSearch() {
        const searchQuery = searchInput.value;
        if (searchQuery) {
            window.location.href = `resultpage.php?search=${encodeURIComponent(searchQuery)}`;
        }
    }

    // Trigger search on button click
    searchButton.addEventListener('click', performSearch);

    // Trigger search on pressing Enter
    searchInput.addEventListener('keypress', function (event) {
        if (event.key === 'Enter') {
            performSearch();
        }
    });
</script>