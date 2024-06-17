<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
}
?>
<?php
include "header.php";
include "connection.php";
?>
<div class="col p-5">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="">
                <div class="">
                    <h2>Display All Customer Comments</h2>
                    <div class=""></div>
                </div>
                <div class="">
                    <table class="table table-bordered">
                        <tr>
                            <th>
                                Comment id
                            </th>
                            <th>
                                Customer id
                            </th>
                            <th>
                                username
                            </th>
                            <th>
                                Comment
                            </th>
                            <th>
                                Comment Time
                            </th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM user_comment";
                        $result = $conn->query($query);
                        if (!$result) {
                            die("Query failed: " . $conn->error);
                        }
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['comment_id'] . "</td>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['comment'] . "</td>";
                            echo "<td>" . $row['timestamp'] . "</td>";
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