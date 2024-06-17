<?php
include 'db_connection.php';
session_start();
$cartCount = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/fontawsomeall.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/script.js"></script>
</head>

<body>
    <nav id="home">
        <div class="navbar-header p-2 w-100 d-block  bg-dark text-light">
            <div class="container-fluid px-5">
                <div class="navbar-header-content d-flex align-items-center">
                    <div class="me-auto">
                        <span class="">
                            <i class="fa-solid fa-location-dot mx-1"></i>
                            Lebanon,
                            Beirut
                        </span>
                        <span class="navbar-header-item">
                            <i class="fa-regular fa-envelope mx-1"></i>
                            Email Protected
                        </span>
                    </div>
                    <div class="">
                        <ul class="navbar-header-ul d-inline p-0 mx-2">
                            <li>Follow us :</li>
                            <li class="navbar-header-item"><a href="http://" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-facebook-f mx-1"></i>
                                </a></li>
                            <li class="navbar-header-item"><a href="http://" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-twitter mx-1"></i>
                                </a></li>
                            <li class="navbar-header-item"><a href="http://" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-instagram mx-1"></i>
                                </a></li>
                        </ul>
                    </div>
                    <div class="navbar-header-login">
                        <span class="navbar-header-item">
                            <?php if (isset($_SESSION['username'])) : ?>
                                <?php echo $_SESSION['username']; ?>
                                <span><a class="mx-2" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></span>
                            <?php else : ?>
                                <a href="login.php">Login\Register</a>
                            <?php endif; ?>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/images/apple logo.png" alt="Logo" width="80" height="80">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="index.php#ourProduct" role="button" data-bs-toggle="dropdown">Products</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="iphone-list.php">Iphone</a></li>
                            <li><a class="dropdown-item" href="mac-list.php">MacBook</a></li>
                            <li><a class="dropdown-item" href="accessories-list.php">Accessories</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="support.php">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News & Blogs</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="cart.php">
                        <button class="navbar-cart-button d-inline btn p-0 mx-1">
                            <span id="cartCount" class="navbar-cart-item-number px-1 m-0"><?php echo $cartCount; ?></span>
                            <i class="fa-solid fa-cart-shopping fa-lg m-0 p-0" style="color: #afafaf;"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </nav>