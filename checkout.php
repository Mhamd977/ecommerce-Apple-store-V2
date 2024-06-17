<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
    $productName = isset($_POST["product_name"]) ? $_POST["product_name"] : null;
    $quantity = isset($_POST["product_qty"]) ? $_POST["product_qty"] : null;
    $description = isset($_POST["product_description"]) ? $_POST["product_description"] : null;


    $insertQuery = "INSERT INTO checkedOut (user_id, user_username,product_name, product_qty, product_description) 
            VALUES ((SELECT id FROM users WHERE username = '$username'), '$username','$productName', $quantity, '$description')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "<div class='alert alert-primary text-center' role='alert'>Thank You for choosing us :)</div>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
