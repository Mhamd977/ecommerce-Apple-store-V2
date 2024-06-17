<?php
session_start();

include 'db_connection.php';
$cartCount = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;

if (!isset($_SESSION['username'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

$user_username = $_SESSION['username'];
$get_user_id_query = "SELECT id FROM users WHERE username = '$user_username'";
$result = mysqli_query($conn, $get_user_id_query);

if (!$result) {
    echo json_encode(['error' => 'Error fetching user ID']);
    exit;
}

$row = mysqli_fetch_assoc($result);
$user_id = $row['id'];

$color = isset($_POST['color']) ? $_POST['color'] : '';
$storage = isset($_POST['storage']) ? $_POST['storage'] : '';
$ram = isset($_POST['ram']) ? $_POST['ram'] : '';
$productImage = isset($_POST['productImage']) ? $_POST['productImage'] : '';

$originalPrice = 999;
$storagePrice = ($storage === '1 TB') ? 200 : (($storage === '2 TB') ? 400 : (($storage === '3 TB') ? 550 : 0));
$ramPrice = ($ram === '32 GB') ? 50 : (($ram === '64 GB') ? 100 : (($ram === '124 GB') ? 200 : 0));
$totalPrice = $originalPrice + $storagePrice + $ramPrice;

$query = "INSERT INTO cart (user_id, user_username, product_color, product_storage, product_ram, product_image, product_price) VALUES ('$user_id', '$user_username', '$color', '$storage', '$ram', '$productImage', $totalPrice)";

if (mysqli_query($conn, $query)) {
    $updatedCartCount = getCartCount($conn, $user_id);
    $_SESSION['cart_count'] = $updatedCartCount; 
    echo json_encode([
        'message' => 'Product added to cart successfully!',
        'updatedPrice' => $totalPrice,
        'cartCount' => $updatedCartCount
    ]);
} else {
    echo json_encode(['error' => 'Error adding to cart: ' . mysqli_error($conn)]);
}

function getCartCount($conn, $user_id) {
    $countQuery = "SELECT COUNT(*) AS cart_count FROM cart WHERE user_id = '$user_id'";
    $countResult = mysqli_query($conn, $countQuery);

    if ($countResult) {
        $countRow = mysqli_fetch_assoc($countResult);
        return $countRow['cart_count'];
    } else {
        return 0;
    }
}

mysqli_close($conn);
?>
