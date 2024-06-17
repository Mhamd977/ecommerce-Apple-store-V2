<?php
include 'nav.php';
include 'db_connection.php';

if (!isset($_SESSION['username'])) {
    header('location: login.php');
    echo "<div class='alert alert-danger text-center' role='alert'>Please login first</div>";
    exit();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_SESSION['username'];
    $comment = $_POST["comment"];
    $query = "INSERT INTO user_comment (user_id, username, comment) VALUES ((SELECT id FROM users WHERE username = '$username'), '$username', '$comment')";
    if (mysqli_query($conn, $query)) {
        echo "<div class='alert alert-primary text-center' role='alert'>Comment submitted successfully!</div>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<section class="product-home-heaader w-100 m-0" style="background-image: url('assets/images/section-1/macbook-banner.jpeg'); background-size: cover; 
    background-position:center;
    background-repeat: no-repeat; height:400px;">
    <div class="container p-5">
        <h1 class="text-white">Apple Support</h1>
    </div>
</section>

<section>
    <div class="container py-5">
        <h3>Hello <?php echo $_SESSION['username']; ?></h3>
        <h5>We are happy to know your comment</h5>
        <form action="support.php" method="post">
            <textarea class="w-100" name="comment" rows="10" required></textarea>
            <br>
            <div class="row">
                <div class="col-12 col-md-4">
                    <button class="footer-go-to-cart-btn mb-3 w-100" type="submit">Submit Comment</button>
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include 'footer.php';
?>