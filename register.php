<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* General body styling */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

       
        .login-container {
            max-width: 1100px;
            margin: 20px auto;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

      /
        .login-form {
            background-color: #ffffff;
            padding: 40px;
            justify-content: center;
        }

        .login-form h2 {
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .login-form .form-group label {
            color: #555;
        }

        .login-form input {
            margin-top: 10px;
        }

        .login-form .btn {
            margin-top: 20px;
            background-color: #178115;
            color: #fff;
            width: 100%;
            max-width: 200px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: none;
        }

        .login-form .btn:hover {
            background-color: #195312;
        }

        .text-center a {
            color: #333;
            font-size: 0.9rem;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        /* Logo section styling */
        .logo-section {
            background-color: #1A0F0F;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
           
            flex-direction: row;
        }

        .logo-section img {
            max-width: 80%;
            height: auto;
            border-radius: 8px;
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {
          
            .login-container {
                flex-direction: column;
            }

            /* Make both sections take full width */
            .login-form, .logo-section {
                width: 100%;
            }

            /* Adjust padding for smaller screens */
            .login-form {
                padding: 30px;
            }

            /* Hide the logo section on smaller screens */
            .logo-section {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row login-container">
        <!-- Login Form Section -->
        <div class="col-md-8 order-md-1 order-2 login-form">
            <h2>Sign Up</h2>
            <form action="signup_process.php" method="post">
                <div class="form-row">
                    <div class="col form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="col form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Optional">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                    </div>
                    <div class="col form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="eg: 1234@gmail.com" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="At least 8 characters" required>
                    </div>
                    <div class="col form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
            
        </div>

        <!-- Logo Section -->
        <div class="col-md-4 order-md-2 order-1 logo-section d-none d-md-flex">
            <img src="img\login-img.png" alt="login_img">
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'footer.php'; ?>
