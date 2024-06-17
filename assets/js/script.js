
// ----------------------------------------------------------------------------------------------------------
$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        400: {
            items: 2,
            nav: false,
        },
        600: {
            items: 3,
            nav: false
        },
        1000: {
            items: 6,
            nav: true,
        }
    }

});
// ////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('.iphone-color-select .option-button').click(function () {
    $('.iphone-color-select .option-button').removeClass('selected-option');
    $(this).addClass('selected-option');
});

$('.iphone-storage-select .option-button').click(function () {
    $('.iphone-storage-select .option-button').removeClass('selected-option');
    $(this).addClass('selected-option');
});
$('.iphone-ram-select .option-button').click(function () {
    $('.iphone-ram-select .option-button').removeClass('selected-option');
    $(this).addClass('selected-option');
});

// 0000000000000000000000
//  AJAX adding item to cart
function updateProductPrice(updatedPrice) {
    var originalPrice = 999;
    var storagePrice = ($(".iphone-storage-select .active").find("p:last").text().replace('+ ', '') * 1) || 0;
    var ramPrice = ($(".iphone-ram-select .active").find("p:last").text().replace('+ ', '') * 1) || 0;
    var totalPrice = originalPrice + storagePrice + ramPrice;
    $("#productPrice").text("$ " + (updatedPrice !== undefined ? updatedPrice : totalPrice));
}

function updateCartCount(cartCount) {
    $("#cartCount").text(cartCount);
}

$(document).ready(function () {
    updateProductPrice();
    $("#buyNowButton").click(function () {
        var color = $(".iphone-color-select .active").text();
        var storage = $(".iphone-storage-select .active").find("p:first").text();
        var ram = $(".iphone-ram-select .active").find("p:first").text();
        var productImage = $("#productImage").attr("src");

        $.ajax({
            url: 'addToCart.php',
            type: 'POST',
            data: {
                color: color,
                storage: storage,
                ram: ram,
                productImage: productImage
            },
            dataType: 'json',
            success: function (response) {
                alert(response.message);
                updateProductPrice(response.updatedPrice);
                updateCartCount(response.cartCount);
            },
            error: function (error) {
                alert("Error adding to cart: " + error.responseJSON.error);
            }
        });
    });

    $(".iphone-color-select button").click(function () {
        $(".iphone-color-select button").removeClass("active");
        $(this).addClass("active");
    });

    $(".iphone-storage-select button").click(function () {
        $(".iphone-storage-select button").removeClass("active");
        $(this).addClass("active");
        updateProductPrice();
    });

    $(".iphone-ram-select button").click(function () {
        $(".iphone-ram-select button").removeClass("active");
        $(this).addClass("active");
        updateProductPrice();
    });
});