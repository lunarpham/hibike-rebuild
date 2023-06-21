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
      <title>Selection Confirm</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/scripts.js" defer="sync"></script>
      <link href="css/styles.css" rel="stylesheet">
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Viga&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Passion+One&display=swap" rel="stylesheet">
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-default" id="mainNav">
        
      </nav>

      <!--Order Confirmation-->
      <div class="container-fluid mt-5 pt-5">
        <div class="section-label text-center py-5">
            <h3 class="secondary-med">CONFIRM YOUR SELECTION</h3>
            <div class="divider d-flex justify-content-center">
                <div class="divider-bottom"></div>
            </div>
        </div>
        <div class="row row-cols-auto g-3 p-2 d-flex justify-content-center">
          <div class="col-md-5">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col"><p class="primary-med mb-0">#</p></th>
                    <th scope="col"><p class="primary-med mb-0">Product name</p></th>
                    <th scope="col"><p class="primary-med mb-0">Price</p></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row"><p class="primary-med my-2">1</p></th>
                    <td><p class="primary-med my-2"><?php echo $name;?></p></td>
                    <td><p class="primary-med my-2">$<?php echo $price;?></p></td>
                    </tr>
                </tbody>
            </table> 
          </div>
        </div>

        <div class="container-fluid d-flex justify-content-center">
          <a href="collect_info.php" class="btn btn-primary rounded-0 fw-bold px-3 py-2" id="checkout-btn">
              CHECK OUT
          </a>

        </div>
        <div class="container d-flex justify-content-center mt-2">
          <a href="products.php">Choose another product</a>
        </div>

      </div>

    <footer class="footer small text-center">
    </footer>
  </body>
</html>