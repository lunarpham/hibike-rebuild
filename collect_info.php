<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <title>Products</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/buy.js"></script>
      <link href="css/styles.css" rel="stylesheet">
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Viga&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Passion+One&display=swap" rel="stylesheet">
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-white" id="mainNav">
        
      </nav>

      <!--Order Confirmation-->
      <div class="container-fluid mt-5 pt-5">
        <div class="section-label text-center py-5">
            <h3>CONFIRM YOUR SELECTION</h3>
            <div class="divider d-flex justify-content-center">
                <div class="divider-bottom"></div>
            </div>
        </div>
        <div class="row row-cols-auto g-3 p-2 d-flex justify-content-center">

          

          <!--Table-->
          <form class="col-md-6" id="orderForm">
            <div class="col">
              <div class="form-floating mb-1">
                <input type="text" class="form-control rounded-0" id="buyerName" placeholder="Your full name">
                <label for="buyerName">Full name</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating mb-1">
                <input type="email" class="form-control rounded-0" id="buyerEmail" placeholder="name@example.com">
                <label for="buyerEmail">Email</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating mb-1">
                <input type="number" class="form-control rounded-0" id="buyerPhone" placeholder="Phone number">
                <label for="buyerPhone">Phone number</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating mb-1">
                <select class="form-select rounded-0" id="buyerRegion" aria-label="Your country/region">
                  <option selected>-Select your country/region-</option>
                  <option value="1">Vietnam</option>
                  <option value="2">Taiwan</option>
                  <option value="3">Hong Kong</option>
                </select>
                <label for="buyerRegion">Country</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating mb-1">
                <input type="text" class="form-control rounded-0" id="buyerCity" placeholder="Your city/state/prefecture">
                <label for="buyerCity">City/State/Prefecture</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating mb-1">
                <input type="email" class="form-control rounded-0" id="buyerAddress" placeholder="Your address">
                <label for="floatingPassword">Address</label>
              </div>
            </div>

            <div class="container-fluid d-flex justify-content-center">
                <button type="submit" class="btn btn-primary rounded-0">
                <div class="d-flex align-items-center text-white fw-bold py-2 px-5">
                    PLACE ORDER
                </button>
            </div>

          </form>
        </div>
        
        
      </div>

    <script>
        $(document).ready(function() {
            $('#orderForm').submit(function(e) {
                e.preventDefault();

                // Serialize the form data
                var formData = $(this).serialize();

                // Send an Ajax POST request to the PHP script
                $.ajax({
                    type: 'POST',
                    url: 'process_order.php',
                    data: formData,
                    success: function(response) {
                        // Redirect to the confirmation page
                        window.location.href = 'order_success.html';
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

    </script>
    <footer class="footer bg-white small text-center text-black-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2023</div></footer>
  </body>
</html>