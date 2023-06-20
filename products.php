<?php

// establish connection to db
require_once('database.php');

// get some data from the DB
$sql = "SELECT * FROM instruments";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Products</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="js/scripts.js" defer="sync"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Viga&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Passion+One&display=swap" rel="stylesheet">
</head>
<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-white" id="mainNav">
        
    </nav>

    <section id="products" class="pt-5 mt-5">
      <div class="label"></div>
      <div class="container px-2 d-flex justify-content-center">
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
                <p class="brand-name text-gray-50"><?php echo $rows['brand'];?></p>
                <h5 class="product-name text-azure fw-bold"><?php echo $rows['name'];?></h5>
                <p class="product-type text-white"><?php echo $rows['type'];?></p>
                <h5 class="product-price fw-bold">$<?php echo $rows['price'];?></h5>
                <button class="btn btn-primary rounded-0 buy-now" type="button" data-product-id="<?php echo $rows['id'];?>">BUY NOW</button>
              </div>
            </div>
          </div>

          
        <?php
              }
        ?>

        </div>
      </div>
    </section>
    <footer class="footer bg-white small text-center text-black-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2023</div></footer>
    <script>
        $(document).ready(function() {
            // Event listener for the "BUY NOW" button click
            $('.buy-now').click(function() {
                // Get the product ID from the clicked button's data attribute
                var productId = $(this).data('product-id');
                
                // Send an Ajax request to store the product ID in cookies
                $.ajax({
                type: 'POST',
                url: 'action.php', 
                data: { product_id: productId },
                success: function(response) {
                    // Redirect to the new webpage
                    window.location.href = 'order_confirm.php?product_ids=' + productId;
                }
                });
            });
        });
    </script>
    
</body>
</html>