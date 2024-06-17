<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
}
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include "connection.php";
include 'header.php';

if (isset($_POST["submit1"])) {
    $tm = md5(time());
    $fnm = $_FILES["iphone_image"]["name"];
    $dst = "./custom_images/" . $tm . $fnm;
    $dst1 = "custom_images/" . $tm . $fnm;
    move_uploaded_file($_FILES["iphone_image"]["tmp_name"], $dst);

    $iphone_name = $_POST["iphone_name"];
    $iphone_color = $_POST["iphone_color"];
    $iphone_storage = $_POST["iphone_storage"];
    $iphone_price = $_POST["iphone_price"];
    $iphone_qty = $_POST["iphone_qty"];
    $iphone_image = $dst1;

    if (move_uploaded_file($_FILES["iphone_image"]["tmp_name"], $dst)) {
        if ($conn) {
            $query = "INSERT INTO add_iphone (iphone_name, iphone_color, iphone_storage, iphone_price, iphone_qty, iphone_image) VALUES ('$iphone_name', '$iphone_color', '$iphone_storage', '$iphone_price', '$iphone_qty', '$iphone_image')";

            if (mysqli_query($conn, $query)) {
                ?>
                <script type="text/javascript">
                    alert("iPhone inserted successfully");
                </script>
            <?php
            } else {
                echo "Error inserting into the database: " . mysqli_error($conn);
            }
        } else {
            echo "Database connection failed.";
        }
    } else {
        echo "Error moving uploaded file.";
    }
}
?>

<div class="col p-5">
    <h2>Add iPhone</h2>
    <div class="">
        <form name="form1" action="" method="post" class="" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td>
                        <input type="text" class="form-control" placeholder="iPhone name" name="iphone_name" required="">
                    </td>
                </tr>
                <tr>
                    <td>
                        iPhone image
                        <input type="file" name="iphone_image" accept="custom_images/*" required="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="iphone_color">Color</label>
                        <select name="iphone_color" class="form-control" id="">
                            <option value="Black Titanium">Black</option>
                            <option value="Natural Titanium">Natural</option>
                            <option value="White Titanium">White</option>
                            <option value="Blue Titanium">Blue</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="iphone_storage">Storage</label>
                        <select name="iphone_storage" class="form-control" id="">
                            <option value="128 GB">128 GB</option>
                            <option value="252 GB">252 GB</option>
                            <option value="512 GB">512 GB</option>
                            <option value="1 TB">1 TB</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input min="1" type="number" class="form-control" placeholder="Quantity" name="iphone_qty" required="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input min="599" type="number" class="form-control" placeholder="Price per one" name="iphone_price" required="">
                    </td>
                </tr>
            </table>

            <input type="submit" name="submit1" value="Submit" />
        </form>
    </div>
</div>

<?php
include "footer.php";
?>
