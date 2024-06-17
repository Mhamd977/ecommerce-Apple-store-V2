<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
}
include "header.php";
include "connection.php";
?>

<div class="col p-5">
    <h2>View Checked Out Cart</h2>


</div>


<?php
include "footer.php";
?>