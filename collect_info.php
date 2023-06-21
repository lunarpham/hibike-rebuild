<?php
  // Include the retrieve_id.php file
  require_once 'actions/retrieve_id.php';
  require_once 'actions/regions.php';

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

    <div class="container-fluid pt-5 mt-5">
        <div class="section-label text-center py-5">
            <h3 class="secondary-med">CHECK OUT</h3>
            <div class="divider d-flex justify-content-center">
                <div class="divider-bottom"></div>
            </div>
        </div>
    </div>

    <section id="info-collect" class=" d-flex justify-content-center container-fluid">
        <div class="row row-col-auto g-5 container d-flex">
            <div class="col">
                <h4 class="primary-med">Your selection</h4>
                <hr class="style1">
                <div class="d-flex justify-content-between">
                    <img src="<?php echo $image;?>" alt="" width="120rem">
                    <p><?php echo $name;?></p>
                    <p class="primary-bold">$<?php echo $price;?></p>
                </div>
                <hr class="style1">
                <div class="d-flex justify-content-between">
                    <p>Subtotal</p>
                    <p class="primary-bold" id="subtotal">$<?php echo $price;?></p>
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
                <div class="d-flex justify-content-between">
                    <p class="primary-reg" id="warning-message" style="color:brown"></p>
                </div>
            </div>
            <div class="col">
                <!--Table-->
                <h4 class="primary-med">Contact Information</h4>
                <hr class="style1">
                <form class="col" id="orderForm">
                    <div class="col">
                    <div class="form-floating has-validation mb-1">
                        <input type="text" class="form-control rounded-0 text-capitalize" id="buyerName" placeholder="Your full name">
                        <label for="buyerName">Full name</label>
                    </div>
                    </div>

                    <div class="col mt-3">
                    <div class="form-floating mb-1">
                        <input type="email" class="form-control rounded-0" id="buyerEmail" placeholder="name@example.com">
                        <label for="buyerEmail">Email</label>
                    </div>
                    </div>

                    <div class="col mt-3">
                    <div class="form-floating mb-1">
                        <input type="number" class="form-control rounded-0" id="buyerPhone" placeholder="Phone number">
                        <label for="buyerPhone">Phone number</label>
                    </div>
                    </div>

                    <div class="col mt-3">
                    <div class="form-floating mb-1">
                        <select class="form-select rounded-0" id="buyerRegion" aria-label="Your country/region">
                        <option value="0" selected>-Select your country/region-</option>
                        <?php
                            // LOOP TILL END OF DATA
                            while($region=$regionResult->fetch_assoc())
                            {
                        ?>
                        <option value="<?php echo $region['region_name'];?>"><?php echo $region['region_name'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                        <label for="buyerRegion">Country</label>
                    </div>
                    </div>

                    <div class="col mt-3">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control rounded-0 text-capitalize" id="buyerCity" placeholder="Your city/state/prefecture">
                        <label for="buyerCity">City/State/Prefecture</label>
                    </div>
                    </div>

                    <div class="col mt-3">
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control rounded-0 text-capitalize" id="buyerAddress" placeholder="Your address">
                        <label for="floatingPassword">Address</label>
                    </div>
                    </div>
                    <div class="link-danger" id="warning-text"></div>
                    <div class="col mt-3 d-flex justify-content-between">
                        <a href="products.php">Choose another product</a>
                        <button type="submit" class="btn btn-primary rounded-0 fw-bold py-2 px-3" id="checkout-btn">ORDER PLACE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

        <!--Order Confirmation-->
        
            
            
            
        </div>

        <script>
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
              
            function validateForm() {
                var isValid = true;
            
                // Reset validation classes
                $('input, select').removeClass('is-invalid');
            
                // Retrieve user input values
                var buyerName = $('#buyerName').val().trim();
                var buyerEmail = $('#buyerEmail').val().trim();
                var buyerPhone = $('#buyerPhone').val().trim();
                var buyerRegion = $('#buyerRegion').val();
                var buyerCity = $('#buyerCity').val().trim();
                var buyerAddress = $('#buyerAddress').val().trim();
            
                // Check for blank inputs

                if (buyerName === '') {
                $('#buyerName').addClass('is-invalid');
                isValid = false;
                }
                if (buyerEmail === '') {
                $('#buyerEmail').addClass('is-invalid');
                isValid = false;
                }
                if (buyerPhone === '') {
                $('#buyerPhone').addClass('is-invalid');
                isValid = false;
                }
                if (buyerRegion === '0') {
                $('#buyerRegion').addClass('is-invalid');
                isValid = false;
                }
                if (buyerCity === '') {
                $('#buyerCity').addClass('is-invalid');
                isValid = false;
                }
                if (buyerAddress === '') {
                $('#buyerAddress').addClass('is-invalid');
                isValid = false;
                }
            
                // Email validation
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (buyerEmail !== '' && !emailRegex.test(buyerEmail)) {
                $('#buyerEmail').addClass('is-invalid');
                isValid = false;
                }
            
                // Phone number validation
                var phoneRegex = /^\d{10}$/;
                if (buyerPhone !== '' && !phoneRegex.test(buyerPhone)) {
                $('#buyerPhone').addClass('is-invalid');
                isValid = false;
                }
            
                return isValid;
            };

            function capitalizeFirstLetter(input) {
                return input.replace(/\b\w/g, function(match) {
                    return match.toUpperCase();
                });
            }

            function capitalizeInputs() {
                $('input[type="text"]').each(function() {
                    var inputValue = $(this).val();
                    var capitalizedValue = capitalizeFirstLetter(inputValue);
                    $(this).val(capitalizedValue);
                });
            }

            function checkId() {
              var idValid = true;
              var id = '<?php echo $id;?>';

              if (id === '0') {
                $('#warning-message').text('No product has been selected.');
                idValid = false;
              } 
              
              return idValid;
            }

            $(document).ready(function() {
                $('#checkout-btn').click(function(e) {
                e.preventDefault();

                capitalizeInputs();
                var isValid = validateForm();
                var idValid = checkId();
            
                if (isValid && idValid) {
                    // Retrieve product details and user input values
                    var productName = '<?php echo $name; ?>';
                    var productPrice = '<?php echo $price; ?>';
                    var buyerName = $('#buyerName').val();
                    var buyerEmail = $('#buyerEmail').val();
                    var buyerPhone = $('#buyerPhone').val();
                    var buyerRegion = $('#buyerRegion').val();
                    var buyerCity = $('#buyerCity').val();
                    var buyerAddress = $('#buyerAddress').val();
            
                    // Perform AJAX request to submit the order
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
                }
                });
            });
            
            
    </script>
    <footer class="footer small text-center">
    </footer>
  </body>
</html>