<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
}
?>
<?php
include "connection.php";
include "header.php";
?>
<style>
    body,
    html {
        overflow-x: visible;
    }
</style>
<div class="col p-5">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="">
                <div class="">
                    <h2>Display All Products </h2>
                    <hr>
                </div>
                <div class="">
                    <h5>Display All iPhones </h5>
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>
                                Image
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Color
                            </th>
                            <th>
                                Storage
                            </th>
                            <th>
                                Available Quantity
                            </th>
                            <th>
                                Price
                            </th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM add_iphone";
                        $result = $conn->query($query);
                        if (!$result) {
                            die("Query failed: " . $conn->error);
                        }
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><img src='{$row['iphone_image']}' alt='{$row['iphone_name']}' style='max-width: 100px; max-height: 100px;'></td>";
                            echo "<td class'pt-5'>" . $row['iphone_name'] . "</td>";
                            echo "<td>" . $row['iphone_color'] . "</td>";
                            echo "<td>" . $row['iphone_storage'] . "</td>";
                            echo "<td>" . $row['iphone_qty'] . "</td>";
                            echo "<td>" . $row['iphone_price'] . "</td>";
                            echo "<td><a href='edit_books.php?id={$row['iphone_id']}' class='btn btn-'>Edit</a></td>";
                            echo "<td><a href='delete_iphone.php?id={$row['iphone_id']}' class='btn btn-'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
                <hr>
                <div class="">
                    <h5>Display All Mac </h5>
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>
                                Image
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Color
                            </th>
                            <th>
                                Storage
                            </th>
                            <th>
                                ram
                            </th>
                            <th>
                                Available Quantity
                            </th>
                            <th>
                                Price
                            </th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM add_mac";
                        $result = $conn->query($query);
                        if (!$result) {
                            die("Query failed: " . $conn->error);
                        }
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><img src='../{$row['mac_image']}' alt='{$row['mac_name']}' style='max-width: 100px; max-height: 100px;'></td>";
                            echo "<td>" . $row['mac_name'] . "</td>";
                            echo "<td>" . $row['mac_color'] . "</td>";
                            echo "<td>" . $row['mac_storage'] . "</td>";
                            echo "<td>" . $row['mac_ram'] . "</td>";
                            echo "<td>" . $row['mac_qty'] . "</td>";
                            echo "<td>" . $row['mac_price'] . "</td>";
                            echo "<td><a href='edit_books.php?id={$row['iphone_id']}' class='btn btn-'>Edit</a></td>";
                            echo "<td><a href='delete_iphone.php?id={$row['iphone_id']}' class='btn btn-'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>