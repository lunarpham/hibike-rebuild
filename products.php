<?php

// establish connection to db
require_once('actions/database.php');

// get some data from the DB
$sql = "SELECT * FROM instruments";
$result = $conn->query($sql);

setcookie('product_id', 0, time() + 3600, '/');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="icon" href="logo/logo.webp">
        <title>All Products</title>
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
<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-default" id="mainNav">
        
    </nav>

    <div class="container-fluid pt-5 mt-5">
      <div class="section-label text-center py-5">
          <h3 class="secondary-med">ALL OUR PRODUCTS</h3>
          <div class="divider d-flex justify-content-center">
              <div class="divider-bottom"></div>
          </div>
      </div>
    </div>

    <section id="products" class="d-flex justify-content-center">
      
      <div class="label"></div>
      <div class="container-fluid px-2">
        <div class="row pt-1 row-cols-auto d-flex justify-content-center">

          <?php
            // LOOP TILL END OF DATA
            while($rows=$result->fetch_assoc())
            {
          ?>

          <div class="col d-flex justify-content-center mb-3">
            <div class="card p-1 mx-1 border-1 rounded-0 product-card" style="width: 16rem;">
              <img src="<?php echo $rows['image'];?>" alt="">
              <div class="card-body">
                <p class="product-type text-white primary-med mb-1"><?php echo $rows['type'];?></p></p>
                <h5 class="product-name primary-bold text-azure"><?php echo $rows['name'];?></h5>
                <h5 class="product-price fw-bold">$<?php echo $rows['price'];?></h5>
                <button class="btn-custom border border-2 rounded-0 fw-bold p-2 view-details" type="button" data-product-id="<?php echo $rows['id'];?>">VIEW DETAILS</button>
              </div>
            </div>
          </div>

          <?php
            }
          ?>

        </div>
      </div>
    </section>
    <script>
        $(document).ready(function() {
          // Event listener for the "BUY NOW" button click
          $('.view-details').click(function() {
              // Get the product ID from the clicked button's data attribute
              var productId = $(this).data('product-id');
              
              // Send an Ajax request to store the product ID in cookies
              $.ajax({
              type: 'POST',
              url: 'actions/set_cookies.php', 
              data: { product_id: productId },
              success: function(response) {
                  // Redirect to the new webpage
                  window.location.href = 'product_details.php?product_ids=' + productId;
              }
              });
          });
        });
    </script>

    <footer class="footer small text-center">
    </footer>
</body>
</html>