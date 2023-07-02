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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
            integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
            crossorigin="anonymous"></script>
        <link href="css/styles.css" rel="stylesheet">
        <script src="js/scripts.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-default" id="mainNav">

    </nav>

    <section id="info-collect" class="d-flex justify-content-center">
        <div class="container bg-white border-pink rounded-4 section-wrapper">
            <div class="container-fluid">

                <!--Label-->
                <div class="section-label text-center py-5">
                    <h3 class="secondary-med">CONTACT & PAYMENT</h3>
                    <div class="divider d-flex justify-content-center">
                        <div class="divider-bottom"></div>
                    </div>
                </div>
            </div>
            <div class="container d-flex justify-content-center align-items-center" id="info-form">
                <div class="row container pb-5 d-flex justify-content-center">
                    <div class="col p-0 m-2">
                        <!--Contact Table-->
                        <h4 class="primary-med">Contact Information</h4>
                        <hr class="style1">
                        <form class="col" id="orderForm">

                            <!--Buyer name-->
                            <div class="col">
                                <div class="form-floating has-validation mb-1">
                                    <input type="text" class="form-control rounded-3 text-capitalize" id="buyerName" placeholder="Your full name">
                                    <label for="buyerName">Full name</label>
                                </div>
                            </div>

                            <!--Buyer email-->
                            <div class="col mt-3">
                                <div class="form-floating mb-1">
                                    <input type="email" class="form-control rounded-3" id="buyerEmail" placeholder="name@example.com">
                                    <label for="buyerEmail">Email</label>
                                </div>
                            </div>

                            <!--Buyer phone-->
                            <div class="col mt-3">
                                <div class="form-floating mb-1">
                                    <input type="number" class="form-control rounded-3" id="buyerPhone" placeholder="Phone number">
                                    <label for="buyerPhone">Phone number</label>
                                </div>
                            </div>

                            <!--Buyer country/region-->
                            <div class="col mt-3">
                                <div class="form-floating mb-1">
                                    <select class="form-select rounded-3" id="buyerRegion" aria-label="Your country/region">
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

                            <!--Buyer city-->
                            <div class="col mt-3">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control rounded-3 text-capitalize" id="buyerCity" placeholder="Your city/state/prefecture">
                                <label for="buyerCity">City/State/Prefecture</label>
                            </div>
                            </div>

                            <!--Buyer specific address-->
                            <div class="col mt-2">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control rounded-3 text-capitalize" id="buyerAddress" placeholder="Your address">
                                <label for="floatingPassword">Address</label>
                            </div>
                            </div>
                            <div class="link-danger" id="warning-text"></div>
                        </form>
                    </div>

                    <!--Payment method-->
                    <div class="col p-0 m-2">
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

                        <!--Back or Continue-->
                        <div class="col mt-5 d-flex justify-content-between">
                            <a href="products.php">Choose another product</a>
                            <button type="submit" class="btn btn-primary rounded-3 fw-bold py-2 px-3" id="send-info">
                                <h5 class="m-0 p-1">CHECK OUT</h5>
                            </button>
                        </div>
                    </div>

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

        // Capitalize first letter of each word in a string
        function capitalizeFirstLetter(input) {
            return input.replace(/\b\w/g, function(match) {
                return match.toUpperCase();
            });
        }

        // Capitalize first letter of each word in all input fields
        function capitalizeInputs() {
            $('input[type="text"]').each(function() {
                var inputValue = $(this).val();
                var capitalizedValue = capitalizeFirstLetter(inputValue);
                $(this).val(capitalizedValue);
            });
        }    

        $(document).ready(function() {
            $('#send-info').click(function(e) {
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