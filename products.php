<?php
// establish connection to db
require_once('actions/database.php');

// get some data from the DB
$sql = "SELECT * FROM instruments";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="logo/logo.webp">
    <title>All Products</title>
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
<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-default" id="mainNav">
        
    </nav>

    
    <!--Label-->
    <section id="products">
      <div class="container-fluid pt-5 mt-5">
        <div class="section-label text-center py-5">
            <h3 class="secondary-med">ALL OUR PRODUCTS</h3>
            <div class="divider d-flex justify-content-center">
                <div class="divider-bottom"></div>
            </div>
        </div>
      </div>

      <div class="container-fluid px-2 d-flex justify-content-center">
        <div class="row pt-1 row-cols-auto d-flex justify-content-center">

          <?php
            // LOOP TILL END OF DATA
            while($rows=$result->fetch_assoc())
            {
          ?>
          
          <!--Product card-->
          <div class="col d-flex justify-content-center mb-3">
            <div class="card p-1 rounded-4 bg-white border-pink product-card pt-2">
              <img src="<?php echo $rows['image'];?>" alt="<?php echo $rows['image'];?>" class="rounded-3"> <!--Image-->
              <div class="card-body">
                <p class="product-type text-white primary-med mb-1 rounded-2"><?php echo $rows['type'];?></p> <!--Instrument type-->
                <h5 class="product-name primary-bold text-azure"><?php echo $rows['name'];?></h5> <!--Instrument name-->
                <h5 class="product-price fw-bold">$<?php echo $rows['price'];?></h5> <!--Price-->
                <button class="btn-custom rounded-3 fw-bold p-2 view-details" type="button" data-product-id="<?php echo $rows['id'];?>">VIEW DETAILS</button>
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
              url: 'actions/get_product.php', 
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