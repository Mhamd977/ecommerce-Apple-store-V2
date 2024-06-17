<?php
include 'db_connection.php';
include 'nav.php'
?>

<style>
    .showing h1,
    .showing h2,
    .showing h5,
    .showing a {
        text-shadow: #afafaf 1px 0 10px;
    }

    .mt-170 {
        margin-top: 170px;
    }

    @media screen and (max-width: 662px) {
        .section-1-bg {
            height: 350px;
        }

        .mt-170 {
            margin-top: 50px;
        }
    }
</style>

<?php
$cartCount = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
?>
<?php if (!isset($_SESSION['username']) || $cartCount == 0) : ?>
    <div>
        <section class="text-center p-5 my-0 " style="background-color: rgb(251, 250, 252); ">
            <a href="index.php">
                <img height="400" src="assets/images/cart-apple-logo.png" alt="cart apple logo">
                <h2>There is no items here
                </h2>
                <h5>Finish off your list with great last-minute.</h5>
                <h1 class="text-primary"><b>Shop Now</b></h1>
            </a>
        </section>


        <section id="" class="showing mt-1">
            <div class="row">
                <div class="col-12 m-0 p-0">
                    <div class="section-1-bg pt-5" style="background-image: url('assets/images/section-1/all-products.jpeg')">
                        <div class="text-center text-white fw-bold fs-3">
                            <h1 class="mt-170">Shop Now</h1>
                            <h5></h5>
                            <!-- <p class="fs-5  fw-normal"><a href="#">learn more ></a> <a href="#">Buy ></a></p> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 m-0 p-0">
                    <div class="section-1-bg" style="background-image: url('assets/images/section-1/Apple-iPhone-15-Pro-lineup.webp')">
                        <div class="text-center text-white fw-bold fs-3 pt-5">
                            <h2>Iphone 15 Pro</h2>
                            <h5>Titanium</h5>
                            <p class="fs-5  fw-normal"><a href="#">learn more ></a> <a href="#">Buy ></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 m-0 p-0">
                    <div class="section-1-bg" style="background-image: url('assets/images/section-1/all-macbook-pro.webp');">
                        <div class="text-center text-dark fw-bold fs-3 pt-5">
                            <h2>MacBook Pro</h2>
                            <h5>Mind-Blowing</h5>
                            <p class="fs-5  fw-normal"><a href="#">learn more ></a> <a href="#">Buy ></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-12 m-0 p-0">
                    <div class="section-1-bg py-5" style="background-image: url('assets/images/section-1/MacBook-Air.jpeg');">
                        <div class="text-center text-white fw-bold fs-3 mt-170">
                            <h2>MacBook Air</h2>
                            <h5>Light, Slim</h5>
                            <p class="fs-5  fw-normal"><a href="#">learn more ></a> <a href="#">Buy ></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 m-0 p-0">
                    <div class="section-1-bg py-5" style="background-image: url('assets/images/section-1/thunderbolt-cable.webp');">
                        <div class="text-center text-dark fw-bold fs-3 mt-170">
                            <h2>Charging Cable</h2>
                            <h5>Thunderbolt 4</h5>
                            <p class="fs-5  fw-normal"><a href="#">learn more ></a> <a href="#">Buy ></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
<?php else : ?>
    <div>
        <section>
            <div class="container">
                <?php
                if (isset($_SESSION['username'])) {
                    $user_username = $_SESSION['username'];
                    $get_user_id_query = "SELECT id FROM users WHERE username = '$user_username'";
                    $result = mysqli_query($conn, $get_user_id_query);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $user_id = $row['id'];

                        $get_cart_items_query = "SELECT * FROM cart WHERE user_id = '$user_id'";
                        $cart_result = mysqli_query($conn, $get_cart_items_query);

                        while ($cart_row = mysqli_fetch_assoc($cart_result)) {
                            $product_id = $cart_row['product_id'];
                            // $product_name = $cart_row['product_name'];
                            $product_name = 'Product';
                            $product_color = $cart_row['product_color'];
                            $product_storage = $cart_row['product_storage'];
                            $product_ram = $cart_row['product_ram'];
                            $quantity = 1;
                            $price = $cart_row['product_price'];
                            $image_path = $cart_row['product_image'];

                            $product_description = $product_color . ', ' . $product_storage . ', ' . $product_ram;
                            echo '<div class="rounded row m-3 bg-light p-3 align-items-center text-center" data-cart-id="' . $cart_row['cart_id'] . '">';
                            echo '<div class="col-6 col-md-3 mt-1">';
                            echo '<img class="product-img-cart" style="width: 50%;" src="' . $image_path . '" alt="">';
                            echo '</div>';
                            echo '<div class="col-6 col-md-3 mt-1 text-start">';
                            echo '<h3 class="product-name">' . $product_name . '&nbsp;</h3>';
                            echo '<h5 class="text-secondary">' . $product_description . '</h5>';
                            echo '</div>';
                            echo '<div class="col-6 col-md-3 mt-1">';
                            echo '<p class="m-0 quantity" data-product-id="' . $product_id . '">x' . $quantity . '</p>';
                            echo '<div class="border rounded p-1 mt-2 mx-auto " style="width: fit-content;">';
                            echo '<button class="btn btn-secondary mx-1 removeQty">-</button>';
                            echo '<button class="btn btn-primary mx-1 addQty">+</button>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="col-6 col-md-3 mt-1">';
                            echo '<h4 class="price" data-price="' . $price . '">$ ' . $price . '</h4>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "Error fetching user ID.";
                    }
                } else {
                    echo "User is not logged in.";
                }
                ?>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            <script>
                $(document).ready(function() {
                    updateTotalPrice();

                    $(".addQty").on("click", function() {
                        var quantityElement = $(this).closest(".row").find(".quantity");
                        var currentQuantity = parseInt(quantityElement.text().replace("x", ""));
                        quantityElement.text("x" + (currentQuantity + 1));
                        updateTotalPrice();
                    });

                    $(".removeQty").on("click", function() {
                        var quantityElement = $(this).closest(".row").find(".quantity");
                        var currentQuantity = parseInt(quantityElement.text().replace("x", ""));

                        if (currentQuantity > 1) {
                            quantityElement.text("x" + (currentQuantity - 1));
                        } else {
                            alert("Cannot decrease quantity below 1. Do you want to delete this item from your cart?");
                            var cartId = $(this).closest(".row").data("cart-id");
                            $.ajax({
                                url: 'removeCartItem.php',
                                type: 'POST',
                                data: {
                                    cartId: cartId
                                },
                                dataType: 'json',
                                success: function(response) {
                                    if (response.success) {
                                        alert("Item removed successfully!");
                                        $(`[data-cart-id='${cartId}']`).addClass("removed-item").remove();
                                        updateTotalPrice('subtract');
                                    } else {
                                        alert("Error removing item.");
                                    }
                                },
                            });
                        }
                        updateTotalPrice();
                    });

                    function updateTotalPrice(x) {
                        var totalPrice = 0;
                        $(".rounded.row.m-3.bg-light.p-3.align-items-center.text-center").each(function() {
                            var quantity = parseInt($(this).find(".quantity").text().replace("x", ""));
                            var price = parseFloat($(this).find(".price").data("price"));
                            var oneProductTotalPrice = quantity * price;

                            if (x === 'subtract') {
                                if ($(this).hasClass("removed-item")) {
                                    return;
                                }
                            }
                            totalPrice += oneProductTotalPrice;
                            $(this).find(".price").text("$ " + oneProductTotalPrice.toFixed(2));
                        });

                        $("#totalPrice").text("$ " + totalPrice.toFixed(2));
                        var tax = totalPrice * (11 / 100);
                        $("#totalTax").text("$ " + tax.toFixed(2));
                        var totalTotalPrice = totalPrice + tax;
                        $(".totalTotalPrice").text("$ " + totalTotalPrice.toFixed(2));
                    }
                });
            </script>

        </section>

        <section>
            <div class="container px-5">
                <div class="row">
                    <div class="col-6">
                        <h5>Subtotal:</h5>
                    </div>
                    <div class="col-6 text-end">
                        <?php echo '<h5 id="totalPrice">$ '  . $price . '</h5>' ?>
                    </div>
                    <div class="col-6">
                        <h5>Shipping:</h5>
                    </div>
                    <div class="col-6 text-end">
                        <h5>$ 0</h5>
                    </div>
                    <div class="col-6">
                        <h5>Tax:</h5>
                    </div>
                    <div class="col-6 text-end">
                        <h5 id="totalTax"></h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <h3>Total:</h3>
                    </div>
                    <div class="col-6 text-end">
                        <h3 class="totalTotalPrice"></h3>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-8 d-none d-md-block"></div>
                    <div class="col-12 col-md-4">
                        <form action="cart.php" method="post">
                            <button id="checkoutBtn" name="checkout" class="footer-go-to-cart-btn mb-3">
                                <i class="fa-brands fa-opencart mx-1"></i> Check Out
                            </button>
                        </form>

                        <?php
                        error_reporting(E_ALL);
                        ini_set('display_errors', 1);

                        if (isset($_POST['checkout'])) {
                            while ($cart_row = mysqli_fetch_assoc($cart_result)) {
                                $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
                                $product_id = $cart_row['product_id'];
                                $product_name = 'Product';
                                $product_color = $cart_row['product_color'];
                                $product_storage = $cart_row['product_storage'];
                                $product_ram = $cart_row['product_ram'];
                                $quantity = 1;
                                $price = $cart_row['product_price'];
                                $image_path = $cart_row['product_image'];

                                if (isset($conn)) {
                                    $insertQuery = "INSERT INTO checkedOut (user_id, user_username, product_name, product_qty, product_description) 
                                    VALUES ((SELECT id FROM users WHERE username = '$username'), '$username', '$product_name', $quantity, '$product_color, $product_storage, $product_ram')";

                                    if (mysqli_query($conn, $insertQuery)) {
                                        $deleteQuery = "DELETE FROM cart WHERE user_id = (SELECT id FROM users WHERE username = '$username') AND product_id = $product_id";
                                        mysqli_query($conn, $deleteQuery);

                                        echo "<div class='alert alert-primary text-center' role='alert'>Checkout successful!</div>";
                                    } else {
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                } else {
                                    echo "Error: Database connection not established.";
                                }
                            }
                            mysqli_data_seek($cart_result, 0); // Reset the result set pointer after the loop
                        }
                        ?>
                    </div>



                </div>
            </div>
        </section>

        <section class="mb-">
            <div style="background-image: url('assets/images/section-1/bag-iimage-cart.jpeg'); height:50vh">
                <div class="container p-5">
                    <h2 class="mt-5 p-5 text-capitalize">Thank you for your purchase</h2>
                </div>
            </div>
        </section>
    </div>
<?php endif; ?>

<?php
include 'footer.php'
?>