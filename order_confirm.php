<?php
// Include the database.php file
require_once 'database.php';

// Retrieve the product ID from the cookie
$productId = $_COOKIE['product_id'];

// Fetch other product details based on the product ID
$sql = "SELECT * FROM instruments WHERE id = $productId";
$result = $conn->query($sql);

// Check if the query was successful
if ($result && $result->num_rows > 0) {
    $productDetails = $result->fetch_assoc();

    // Access the retrieved product details
    $id = $productDetails['id'];
    $name = $productDetails['name'];
    $type = $productDetails['type'];
    $brand = $productDetails['brand'];
    $price = $productDetails['price'];
    $image = $productDetails['image'];

} else {
    echo "Product not found.";
}

// Close the database connection
$conn->close();
?>

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
          <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col"><h5>#</h5></th>
                    <th scope="col"><h5>Product Name</h5></th>
                    <th scope="col"><h5>Price</h5></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td><?php echo $name;?></td>
                    <td>$<?php echo $price;?></td>
                    </tr>
                </tbody>
            </table> 
          </div>

          

          <!--Table-->
          <!--<div class="col-md-6">
            <div class="col">
              <div class="form-floating mb-1">
                <input type="text" class="form-control rounded-0" id="floatingInput" placeholder="Your full name">
                <label for="floatingInput">Full name</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating mb-1">
                <input type="email" class="form-control rounded-0" id="floatingPassword" placeholder="name@example.com">
                <label for="floatingPassword">Email</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating mb-1">
                <select class="form-select rounded-0" id="floatingSelect" aria-label="Floating label select example">
                  <option selected>--Select your country--</option>
                  <option value="1">Vietnam</option>
                  <option value="2">Taiwan</option>
                  <option value="3">Hong Kong</option>
                </select>
                <label for="floatingSelect">Country</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating mb-1">
                <input type="email" class="form-control rounded-0" id="floatingPassword" placeholder="name@example.com">
                <label for="floatingPassword">Address</label>
              </div>
            </div>
          </div>-->
        </div>

        <div class="container-fluid d-flex justify-content-center">
          <a href="collect_info.php" class="btn btn-primary rounded-0" id="checkout-btn">
            <div class="d-flex align-items-center text-white fw-bold py-2 px-5">
              CHECK OUT
              <i class="large material-icons" id="arrow-right" style="font-size: 1.5rem; color:rgb(255, 255, 255)">chevron_right</i></div>
          </a>
        </div>

      </div>
    <footer class="footer bg-white small text-center text-black-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2023</div></footer>
  </body>
</html>