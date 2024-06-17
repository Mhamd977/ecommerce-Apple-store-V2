<?php
session_start();
if (!isset($_SESSION["admin"])) {
?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
<?php
}
?>
<?php
include "header.php";
include "connection.php";
?>


<div class="col p-5">

    <div class="">
        <div class="">
            <h2>Edit Books</h2>
        </div>
        <div class="">
            <?php
            $id = $_GET["id"];
            $res = mysqli_query($link, "select * from add_iphone where id=$id");
            while ($row = mysqli_fetch_array($res)) {
                $book_title = $row["books_title"];
                $books_author_name = $row["books_author_name"];
                $books_isbn = $row["books_isbn"];
                $available_qty = $row["available_qty"];
            }
            ?>
            <form name="form1" action="" method="post" class="" enctype="multipart/form-data">
                <table class="table table-bordered w-100">
                    <tr>
                        <td>Books Title
                            <input type="text" class="form-control" placeholder="books title" name="booksname" required="" value="<?php echo $book_title; ?>">
                        </td>
                    </tr>


                    <tr>
                        <td>
                            Books Author Name
                            <input type="text" class="form-control" placeholder="books author name" name="bauthorname" required="" value="<?php echo $books_author_name; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Books ISBN
                            <input type="text" class="form-control" placeholder="books ISBN" name="bisbn" value="<?php echo $books_isbn; ?>" required="" pattern="[0-9]{10}" title="enter 10 digit only">
                        </td>
                    </tr>


                    <tr>
                        <td>
                            Available Quantity
                            <input type="text" class="form-control" placeholder="avalilable quantity" name="aqty" id="aqty" autocomplete="off" value="<?php echo $available_qty; ?>" required="" pattern="[0-9]+">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit1" class="btn btn-primary submit" value="update books details">
                        </td>
                    </tr>

                </table>
            </form>

            <?php
            if (isset($_POST["submit1"])) {
                mysqli_query($link, "update add_iphone set books_title='$_POST[booksname]',books_author_name='$_POST[bauthorname]',books_isbn='$_POST[bisbn]',available_qty='$_POST[aqty]' where id=$id");

            ?>
                <script type="text/javascript">
                    alert("record updated successfully");
                    window.location = "display_products.php";
                </script>

            <?php


            }

            ?>

        </div>
    </div>
</div>

<?php
include "footer.php";
?>