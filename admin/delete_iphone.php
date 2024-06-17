<?php
session_start();
if(!isset($_SESSION["admin"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
?>
    <?php
    include "connection.php";

if (isset($_GET["iphone_id"])) {
    $id = $_GET["iphone_id"];
    mysqli_query($link, "DELETE FROM add_iphone WHERE id=$id");
    ?>
    <script type="text/javascript">
        window.location = "display_products.php";

    </script>
    <?php
} else {
    ?>
    <script>
        window.location = "display_products.php";
    </script>
    <?php
}
?>