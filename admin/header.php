<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Apple || Admin Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
    html,
    body {
        overflow-x: hidden;
    }

    a {
        text-decoration: none;
    }
</style>

<body>
    <!-- top navigation -->
    <div class="d-block d-md-none">
        <!--  -->
        <nav class="navbar text-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-dark" href="#">Navbar</a>
                <button class="navbar- btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    | | |
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav text-center">
                        <li class="nav-item">
                            <a class="text-dark" href="display_all_customer.php"><i class="fa fa-edit"></i> All Customer <span class=""></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark" href="add_iphone.php"><i class="fa fa-edit"></i> Add iPhone <span class=""></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark" href="add_mac.php"><i class="fa fa-edit"></i> Add Mac <span class=""></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark" href="display_products.php"><i class="fa fa-book"></i> All Products <span class="n"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark" href="checked_out_product.php"><i class="fa fa-book"></i> Checked Out Product <span class=""></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark" href="customer-comments.php"><i class="fa-regular fa-comment"></i> Customer Comments <span class=""></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark" href="logout.php"><i class="fa fa-sign-out"></i> LogOut <span class=""></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <hr>
    </div>
    <!-- /top navigation -->

    <div class="row ">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark d-md-block d-none">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Admin Dashboard</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <a class="text-white" href="display_all_customer.php"><i class="fa fa-edit"></i> Dispaly All Customer <span class=""></span></a>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <a class="text-white" href="add_iphone.php"><i class="fa fa-edit"></i> Add iPhone <span class=""></span></a>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <a class="text-white" href="add_mac.php"><i class="fa fa-edit"></i> Add Mac <span class=""></span></a>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <a class="text-white" href="display_products.php"><i class="fa fa-book"></i> Display All Products <span class="n"></span></a>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <a class="text-white" href="checked_out_product.php"><i class="fa fa-book"></i> Checked Out Product <span class=""></span></a>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <a class="text-white" href="customer-comments.php"><i class="fa-regular fa-comment"></i> Customer Comments <span class=""></span></a>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="pb-4">
                    <ul class="text-small shadow">
                        <li>
                            <?php if (isset($_SESSION['admin'])) : ?>
                                <?php echo $_SESSION['admin']; ?>
                                <span><a class="mx-2" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></span>
                            <?php else : ?>
                                <a href="login.php"></a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>