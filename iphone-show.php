<?php
include 'nav.php';
?>
<section class="mt-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center">
                <h2 class="text-uppercase font-weight-bold mt-5 pt-5">Iphone 15 Pro</h2>
                <img id="productImage" class="w-75" src="assets/images/iphones/iphone-15-pro-black.jpeg" alt="Product">
            </div>
            <div class="col-12 col-md-6">
                <h2 id="productPrice" class="text-uppercase font-weight-bold mt-5 pt-5 text-end">
                    <!-- product price frm script -->
                </h2>
                <div class="">
                    <div class="selecting-specs p-3">
                        <h5 class="">Colors:</h5>
                        <div class="iphone-color-select">
                            <button class="option-button option-1 selected-option active" onclick="document.getElementById('productImage').src='assets/images/iphones/iphone-15-pro-black.jpeg'">
                                Black Titanium
                            </button>
                            <button class="option-button option-2" onclick="document.getElementById('productImage').src='assets/images/iphones/iphone-15-pro-natural.jpg'">
                                Natural Titanium
                            </button>
                            <button class="option-button option-3" onclick="document.getElementById('productImage').src='assets/images/iphones/iphone-15-pro-white.webp'">
                                White Titanium
                            </button>
                            <button class="option-button option-4" onclick="document.getElementById('productImage').src='assets/images/iphones/iphone-15-pro-blue.jpg'">
                                Blue Titanium
                            </button>
                        </div>
                        <h5>Storage:</h5>
                        <div class="iphone-storage-select">
                            <button class="option-button d-flex justify-content-between selected-option active">
                                <p class="m-0">128 GB</p>
                                <p class="m-0">+ 0</p>
                            </button>
                            <button class="option-button d-flex justify-content-between">
                                <p class="m-0">252 GB</p>
                                <p class="m-0">+ 100</p>
                            </button>
                            <button class="option-button d-flex justify-content-between">
                                <p class="m-0">512 GB</p>
                                <p class="m-0">+ 200</p>
                            </button>
                            <button class="option-button d-flex justify-content-between">
                                <p class="m-0">1 TB</p>
                                <p class="m-0">+ 300</p>
                            </button>
                        </div>

                        <h5>&nbsp;</h5>
                        <?php if (isset($_SESSION['username'])) : ?>
                            <button id="buyNowButton" class="buy-now-option-button">Buy Now</button>
                        <?php else : ?>
                            <button class="buy-now-option-button disable" disabled="disabled">Buy Now &nbsp;&nbsp; Please login</button>
                            <p class="text-center">Please login</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div style="margin:auto; width: fit-content;">
            <h2>What’s in the Box</h2>
            <hr>
        </div>
        <div>
            <img class="w-100" src="assets/images/iphones/iphone-in-the-box.png" alt="in side box image">
        </div>
    </div>
</section>

<section>
    <div style="margin:auto; width: fit-content;">
        <h2>FAQ</h2>
        <hr>
    </div>
    <div class="container">
        <div class="accordion-wrapper">
            <div class="accordion">
                <input type="radio" name="radio-a" id="check1" checked>
                <label class="accordion-label" for="check1">When I buy from apple.com, does my iPhone come ready to use?</label>
                <div class="accordion-content">
                    <p>Carrier-connected iPhone SE, iPhone 13, iPhone 14, iPhone 15, and iPhone 15 Pro models will arrive ready to activate with eSIM and can connect to your cellular voice and data service without a physical SIM card.
                        If you completed the steps to authorize activation with AT&T, T-Mobile, or Verizon when you purchased your new iPhone online, it will arrive ready to use. Just turn it on and follow the onscreen instructions to set it up and activate with the carrier. To activate with eSIM, you will need Wi-Fi for setup.
                    </p>
                </div>
            </div>
            <div class="accordion">
                <input type="radio" name="radio-a" id="check2">
                <label class="accordion-label" for="check2">Will my new iPhone be unlocked?</label>
                <div class="accordion-content">
                    <p>
                        Yes. An iPhone purchased from apple.com(Opens in a new window) is unlocked. Once your new iPhone is activated, it remains unlocked, which means you can use it with any network that provides service for iPhone. The exception is when you buy an iPhone with an AT&T Installment Plan. It will be locked to AT&T and will only work on the AT&T network for the term of your Installment Plan agreement.
                    </p>
                </div>
            </div>
            <div class="accordion">
                <input type="radio" name="radio-a" id="check3">
                <label class="accordion-label" for="check3">Will my iPhone work worldwide?</label>
                <div class="accordion-content">
                    <p>
                        All iPhone models are world phones, so you can use them almost anywhere. Whether you are a GSM or CDMA network customer, you can roam internationally on GSM networks in over 200 countries or regions around the world. If you financed your iPhone with your wireless carrier, contact them to verify that you can roam internationally.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>