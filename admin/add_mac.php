<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
}
?>
<?php
include 'header.php';
session_start();

define("db_SERVER", "localhost");
define("db_USER", "root");
define("db_PASSWORD", "");
define("db_DBNAME", "apple-ecommerce");

$conn = mysqli_connect(db_SERVER, db_USER, db_PASSWORD, db_DBNAME);
if (!$conn) {
    die('Could not connect: ');
}

if (isset($_POST["submit1"])) {
    $tm = md5(time());
    $fnm = $_FILES["mac_image"]["name"];
    $dst = "./custom_images/" . $tm . $fnm;
    $dst1 = "custom_images/" . $tm . $fnm;
    $image_folder = "custom_images";
    if (is_writable($image_folder)) {
        move_uploaded_file($_FILES["mac_image"]["tmp_name"], $dst);
        $mac_name = $_POST["mac_name"];
        $mac_color = $_POST["mac_color"];
        $mac_storage = $_POST["mac_storage"];
        $mac_ram = $_POST["mac_ram"];
        $mac_price = $_POST["mac_price"];
        $mac_qty = $_POST["mac_qty"];
        $mac_image = $dst1;

        $query = "INSERT INTO add_mac (mac_name, mac_color, mac_storage, mac_ram, mac_price, mac_qty, mac_image) 
                  VALUES ('$mac_name', '$mac_color', '$mac_storage', '$mac_ram', '$mac_price', $mac_qty, '$mac_image')";

        if (mysqli_query($conn, $query)) {
            ?>
            <script type="text/javascript">
                alert("Mac inserted successfully");
            </script>
        <?php
        } else {
            echo "Error inserting into the database: " . mysqli_error($conn);
        }
    } else {
        echo "Error: The directory is not writable.";
    }
}

?>



<div class="col p-5">
    <h2>Add MacBook</h2>
    <div class="">
        <form name="form1" action="" method="post" class="" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td>
                        <input type="text" class="form-control" placeholder="mac name" name="mac_name" required="">
                    </td>
                </tr>
                <tr>
                    <td>
                        MacBook image
                        <input type="file" name="mac_image" accept="custom_images/*" required="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mac_color">Color</label>
                        <select name="mac_color" class="form-control" id="">
                            <option value="Black">Black</option>
                            <option value="Silver">Silver</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mac_storage">Storage</label>
                        <select name="mac_storage" class="form-control" id="">
                            <option value="512 GB">512 GB</option>
                            <option value="1 TB">1 TB</option>
                            <option value="2 TB">2 TB</option>
                            <option value="1 TB">3 TB</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mac_ram">Ram</label>
                        <select name="mac_ram" class="form-control" id="">
                            <option value="15 GB">16 GB</option>
                            <option value="32 GB">32 GB</option>
                            <option value="64 GB">64 GB</option>
                            <option value="128 GB">128 GB</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input min="1" type="number" class="form-control" placeholder="Quantity" name="mac_qty" required="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input min="599" type="number" class="form-control" placeholder="Price per one" name="mac_price" required="">
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