<?php

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
?>