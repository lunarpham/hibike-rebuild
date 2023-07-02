<?php
  // Include the retrieve_id.php file
  require_once 'actions/retrieve_id.php';
  $conn->close();
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="icon" href="logo/logo.webp">
      <title>Selection</title>
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

      <section class="d-flex justify-content-center">

        <!--Confirm selection-->
        <div class="container bg-white border-pink rounded-4 section-wrapper" id="order-confirm">

          <!--Label-->
          <div class="section-label text-center pt-5 pb-5">
              <h3 class="secondary-med">CONFIRM YOUR SELECTION</h3>
              <div class="divider d-flex justify-content-center">
                  <div class="divider-bottom"></div>
              </div>
          </div>

          <!--Table-->
          <div class="container">
            <table class="table">
                <thead class="bg-white">
                    <tr>
                    <th scope="col"><p class="primary-med mb-0">Product name</p></th>
                    <th scope="col"><p class="primary-med mb-0">Price</p></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><p class="primary-med my-2"><?php echo $productName;?></p></td>
                    <td><p class="primary-med my-2">$<?php echo $productPrice;?></p></td>
                    </tr>
                </tbody>
            </table>

            <div class="container-fluid d-flex justify-content-center mt-5">
              <a href="collect_info.php" class="btn btn-primary rounded-3 fw-bold px-3 py-2" id="checkout-btn">
                <h5 class="m-0 p-1">CONTINUE</h5>
              </a>

            </div>
            <div class="container d-flex justify-content-center mt-2 pb-5">
              <a href="products.php">Choose another product</a>
            </div>
          </div>
          

        </div>
      </section>
      <!--Order Confirmation-->
      

    <footer class="footer small text-center">
    </footer>
  </body>
</html>