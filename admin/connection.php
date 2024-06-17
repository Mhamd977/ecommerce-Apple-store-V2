<?php
define("db_SERVER", "localhost");
define("db_USER", "root");
define("db_PASSWORD", "");
define("db_DBNAME", "apple-ecommerce");

$conn = mysqli_connect(db_SERVER, db_USER, db_PASSWORD, db_DBNAME);
if (!$conn) {
    die('Could not connect: ');
}
?>