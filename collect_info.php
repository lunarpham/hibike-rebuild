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
      <title>Contact & Payment</title>
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
            <h3 class="secondary-med">CONTACT & PAYMENT</h3>
            <div class="divider d-flex justify-content-center">
                <div class="divider-bottom"></div>
            </div>
        </div>
    </div>

    <section id="info-collect" class=" d-flex justify-content-center container-fluid">
        <div class="row row-col-auto g-5 container d-flex">
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
                </form>
            </div>


            <div class="col">
                <h4 class="primary-med">Payment</h4>
                <hr class="style1">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="onlinePayment" id="onlinePayment" disabled>
                    <label class="form-check-label" for="onlinePayment">
                      Online payment
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="codPayment" id="codPayment" checked>
                    <label class="form-check-label" for="codPayment">
                      Cash on delivery
                    </label>
                </div>
                <hr class="style1">
                <div class="col mt-3 d-flex justify-content-between">
                    <a href="products.php">Choose another product</a>
                    <button type="submit" class="btn btn-primary rounded-0 fw-bold py-2 px-3" id="checkout-btn">
                        PROCEED TO CHECK OUT
                    </button>
                </div>
            </div>

        </div>
    </section>

    <script>
            
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

        $(document).ready(function() {
            $('#checkout-btn').click(function(e) {
            e.preventDefault();

            capitalizeInputs();
            var isValid = validateForm();
        
            if (isValid) {
                // Retrieve product details and user input values
                var buyerName = $('#buyerName').val();
                var buyerEmail = $('#buyerEmail').val();
                var buyerPhone = $('#buyerPhone').val();
                var buyerRegion = $('#buyerRegion').val();
                var buyerCity = $('#buyerCity').val();
                var buyerAddress = $('#buyerAddress').val();
        
                // Perform AJAX request to submit the order
                $.ajax({
                url: 'actions/info_session.php',
                type: 'POST',
                data: {
                    buyer_name: buyerName,
                    buyer_email: buyerEmail,
                    buyer_phone: buyerPhone,
                    buyer_region: buyerRegion,
                    buyer_city: buyerCity,
                    buyer_address: buyerAddress
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = 'order_summary.php';
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