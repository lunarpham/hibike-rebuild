<?php
    // Include the retrieve_id.php file
    require_once 'actions/retrieve_id.php';
    require_once 'actions/regions.php';
    require_once 'actions/info_session.php';

    //Retrieve product details from retrieve_id.php
    //$productId = $productDetails['id'];
    //$productName = $productDetails['name'];
    //$productPrice = $productDetails['price'];

    //Handle information from info_session.php
    $buyerName = isset($_SESSION['buyer_name']) ? $_SESSION['buyer_name'] : '';
    $buyerEmail = isset($_SESSION['buyer_email']) ? $_SESSION['buyer_email'] : '';
    $buyerPhone = isset($_SESSION['buyer_phone']) ? $_SESSION['buyer_phone'] : '';
    $buyerRegion = isset($_SESSION['buyer_region']) ? $_SESSION['buyer_region'] : '';
    $buyerCity = isset($_SESSION['buyer_city']) ? $_SESSION['buyer_city'] : '';
    $buyerAddress = isset($_SESSION['buyer_address']) ? $_SESSION['buyer_address'] : '';

    if (empty($buyerName) || empty($buyerEmail) || empty($buyerPhone) || empty($buyerRegion) || empty($buyerCity) || empty($buyerAddress)) {
        header('Location: products.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="icon" href="logo/logo.webp">
      <title>Check Out</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="js/scripts.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <link href="css/styles.css" rel="stylesheet">
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Viga&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Passion+One&display=swap" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-default" id="mainNav">

    </nav>

    <!--Label-->
    <div class="container-fluid pt-5 mt-5">
        <div class="section-label text-center py-5">
            <h3 class="secondary-med">Order Summary</h3>
            <div class="divider d-flex justify-content-center">
                <div class="divider-bottom"></div>
            </div>
        </div>
    </div>

    <!--Summary-->
    <section id="info-collect" class=" d-flex justify-content-center container-fluid">
        <div class="row row-col-auto g-5 container d-flex">

            <!--Products Summary-->
            <div class="col">
                <h4 class="primary-med">Your selection</h4>
                <hr class="style1">

                <!--Product-->
                <div class="d-flex justify-content-between">
                    <img src="<?php echo $productImage;?>" alt="" width="120rem">
                    <p><?php echo $productName;?></p>
                    <p class="primary-bold">$<?php echo $productPrice;?></p>
                </div>
                <hr class="style1">

                <!--Price-->
                <div class="d-flex justify-content-between">
                    <p>Subtotal</p>
                    <p class="primary-bold" id="subtotal">$<?php echo $productPrice;?></p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Shipping Fee</p>
                    <p class="primary-bold" id="shipfee">$25</p>
                </div>
                <hr class="style1">
                <div class="d-flex justify-content-between">
                    <h5 class="primary-med">Total</h5>
                    <h5 class="primary-bold" id="totalPrice"></h5>
                </div>

                <!--Warning message to show if there is no product has been chosen-->
                <div class="d-flex justify-content-between">
                    <p class="primary-reg" id="warning-message" style="color:brown"></p>
                </div>
            </div>

            <!--Information Summary-->
            <div class="col">
                <!--Buyer Info-->
                <h4 class="primary-med">Contact Information</h4>
                <hr class="style1">
                <p class="primary-bold mb-1" id="fullname"><?php echo $buyerName;?></p>
                <p class="primary-med mb-1" id="phone"><?php echo $buyerPhone;?></p>
                <p class="primary-med mb-1" id="email"><?php echo $buyerEmail;?></p>
                <p class="primary-med mb-1" id="address">
                    <?php echo $buyerAddress;?>, 
                    <?php echo $buyerCity;?>, 
                    <?php echo $buyerRegion;?>
                </p>
                
                <!--Payment Method-->
                <h4 class="primary-med mt-5">Payment method</h4>
                <hr class="style1">
                <p class="primary-med mb-1" id="payment">Cash on delivery</p>
                <hr class="style1">
                <div class="col mt-5 d-flex justify-content-between">
                    <a href="collect_info.php">Edit information</a>
                    <button type="submit" class="btn btn-primary rounded-0 fw-bold py-2 px-3" id="checkout-btn">
                        CONFIRM
                    </button>
                </div>
            </div>
        </div>
    </section>
    
    <script>

        //Calculate total price
        $('#totalPrice').ready(function() {
            // Calculate and update the total amount
            function calculateTotal() {
                var subtotal = parseFloat($('#subtotal').text().replace('$', ''));
                var shippingFee = parseFloat($('#shipfee').text().replace('$', ''));
            
                var total = subtotal + shippingFee;
                $('#totalPrice').text('$' + total.toFixed(2));
            }
            
            // Call the calculateTotal function initially
            calculateTotal();
        });
            

        //POST all information to process_order.php and save to database
        $(document).ready(function() {

            // Get all the information from above
            var productName = "<?php echo $productName;?>";
            var productPrice = "<?php echo $productPrice;?>";
            var buyerName = "<?php echo $buyerName;?>";
            var buyerEmail = "<?php echo $buyerEmail;?>";
            var buyerPhone = "<?php echo $buyerPhone;?>";
            var buyerRegion = "<?php echo $buyerRegion;?>";
            var buyerCity = "<?php echo $buyerCity;?>";
            var buyerAddress = "<?php echo $buyerAddress;?>";

            
            $('#checkout-btn').click(function(){
                $.ajax({
                    url: 'actions/process_order.php',
                    type: 'POST',
                    data: {
                        product_name: productName,
                        product_price: productPrice,
                        buyer_name: buyerName,
                        buyer_email: buyerEmail,
                        buyer_phone: buyerPhone,
                        buyer_region: buyerRegion,
                        buyer_city: buyerCity,
                        buyer_address: buyerAddress
                    },
                    success: function(response) {
                        console.log(response);
                        window.location.href = 'order_success.html';
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
            });
        });
            
            
    </script>
    <footer class="footer small text-center">
    </footer>
  </body>
</html>