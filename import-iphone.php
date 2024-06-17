<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item active">
                            <a href="#" class="nav-link align-middle px-3 active">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-sm-inline active">Iphone</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-sm-inline">Mac</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-sm-inline">Accessory</span>
                            </a>
                        </li>
                        <hr>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-end">
                                <i class="fs-4 bi-speedometer2"></i>
                                <span> <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle"></span>
                                <span class="ms-1 d-sm-inline">Admin</span>
                            </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="logout.php" class="nav-link px-0"> <span class="d-none d-sm-inline">logout</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2 </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col p-5">
                <h1>Dashboard</h1>
                <h3></h3>
                <form action="">
                    <label for="model">Choose the model:</label>
                    <select name="" id="">
                        <option value="iphonePro">Iphone 15 Pro</option>
                        <option value="iphone">Iphone 15</option>
                        <option value="iphoneSe">Iphone SE</option>
                    </select>

                </form>
            </div>
        </div>
</body>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</html>