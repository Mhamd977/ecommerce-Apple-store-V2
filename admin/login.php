<?php
include 'connection.php';
session_start();

if (isset($_POST['action']) && $_POST['action'] === 'login') {
    $username = $_POST['admin'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE admin_username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Check if the entered password matches the stored hashed password
        if (password_verify($password, $row['admin_password'])) {
            // Password is correct, set session variables and redirect to index.php
            $_SESSION['admin'] = $row['admin_username'];
            $_SESSION['admin_admin_id'] = $row['admin_id'];
            header('location: display_products.php');
            exit();
        } else {
            echo "<div class='alert alert-danger text-center text-white m-0' role='alert'>Incorrect username or password</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center m-0' role='alert'>Incorrect username or password</div>";
    }

    $stmt->close();
}

//if we are login we canot access this page
if (isset($_SESSION['admin'])) {
    header('location:http://localhost/webAdvance-Project/admin/display_products.php');
}
?>

<?php
include 'header.php'
?>
<div class="col p-5">
    <h1 style="font-family:Lucida Console">Apple Website Management System</h1>
    <div class="card p-2">
        <div class="login_wrapper">
            <h5>Admin Login</h5>
            <section class="login_content">
                <form name="form1" action="login.php" method="post">
                    <div>
                        <input class="form-control my-2" type="text" name="admin" id="userName" placeholder="Username" required>
                    </div>
                    <div>
                        <input class="form-control my-2" type="password" name="password" id="pwd" placeholder="Password" required>
                    </div>
                    <div>
                        <button type="submit" value="login" class="btn btn-primary submit w-100 my-2">Login</button>
                    </div>
                    <div class="clearfix"></div>
                    <input type="hidden" name="action" value="login">
                </form>
            </section>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>