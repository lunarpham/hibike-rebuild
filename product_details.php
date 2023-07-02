<?php
    // Include the retrieve_id.php file
    require_once 'actions/get_product.php';
    require_once 'actions/database.php';

    $getId = isset($_SESSION['product_id']) ? $_SESSION['product_id'] : '';

    if (empty($getId)) {
        header('Location: ./products.php');
        exit();

    } else {
        $productRetrieve = "SELECT * FROM instruments WHERE id = $getId";
        $productResult = $conn->query($productRetrieve);

        // Check if the query was successful
        if ($productResult && $productResult->num_rows > 0) {
            $productDetails = $productResult->fetch_assoc();

            $productDetails['price'] = ($productDetails['price'] - floor($productDetails['price']) == 0) ? intval($productDetails['price']) : $productDetails['price'];

            // Access the retrieved product details
            $productId = $productDetails['id'];
            $productName = $productDetails['name'];
            $productType = $productDetails['type'];
            $productBrand = $productDetails['brand'];
            $productPrice = $productDetails['price'];
            $productImage = $productDetails['image'];
            $productDescription = $productDetails['description'];

        } else {
            echo "Product not found.";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="icon" href="logo/logo.webp">
        <title><?php echo $productName;?></title>
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
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-default" id="mainNav">

        </nav>

        <!--Product Details-->
        <section id="productDetails" class="d-flex justify-content-center">
            <div class="container bg-white border-pink rounded-4 section-wrapper" id="product-detail">
                <div class="container">

                    <!--Breadcrumb to show current position-->
                    <div class="breadcrumb my-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $productName;?></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-center mb-2" id="productImage">
                            <img src="<?php echo $productImage;?>">
                        </div>
                        <div class="col" id="productInfo">
                            <h3 class="product-name fw-bold "><?php echo $productName;?></h3>
                            <hr class="style1">
                            <div class="row row-col-auto">
                                <div class="col">
                                    <p class="brand-label text-gray-50 primary-bold">Brand</p>
                                    <p class="brand-name text-gray-50 primary-bold rounded-2"><?php echo $productBrand;?></p>
                                </div>
                                <div class="col">
                                    <p class="type-label primary-bold">Type</p>
                                    <p class="type-name primary-bold rounded-2"><?php echo $productType;?></p>
                                </div>
                            </div>
                            <hr class="style1">
                            <h3 class="product-price fw-bold">$<?php echo $productPrice;?></h3>
                            <button class="btn btn-primary rounded-3 buy-now py-3 fw-bold mt-3" id="buy-now">BUY NOW</button>
                            <p class="type-label text-center mt-2 ">In stock and ready to ship</p>
                            <hr class="style1">
                            <div class="row row-col-2">
                                <div class="col">
                                    <div class="d-flex align-item-center">
                                        <i class="large material-icons" style="font-size: 2rem; color:#444">playlist_add_check</i>
                                        <p class="primary-bold px-2 pt-1">Official Warranty</h5>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex align-item-center">
                                        <i class="large material-icons" style="font-size: 2rem; color:#444">gradient</i>
                                        <p class="primary-bold px-2 pt-1">Customization</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-col-2">
                                <div class="col">
                                    <div class="d-flex align-item-center">
                                        <i class="large material-icons" style="font-size: 2rem; color:#444">graphic_eq</i>
                                        <p class="primary-bold px-2 pt-1">Sound Tuning</h5>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex align-item-center">
                                        <i class="large material-icons" style="font-size: 2rem; color:#444">local_shipping</i>
                                        <p class="primary-bold px-2 pt-1">Global Shipping</h5>
                                    </div>
                                </div>
                            </div>
                            <hr class="style1">
                            <div class="ship d-flex">
                                <i class="large material-icons" style="font-size: 2rem; color:#444">refresh</i>
                                <a href="policy.html" class="link-secondary link-offset-2"><p class="primary-bold px-2 pt-1 text-uppercase">Shipping and Return Policy</h5></a>
                            </div>
                        </div>
                    </div>

                    <div class="row row-col-auto mt-4 px-2">
                        <hr class="style1">
                        <div class="col">
                            <h4 class="primary-bold">Description</h5>
                            <p class="primary-reg"><?php echo $productDescription;?></p>
                        </div>
                    </div>
                </div>
            </div>

            
        </section>
        <script>
            $(document).ready(function() {
                // Event listener for the "BUY NOW" button click
                $('.buy-now').click(function() {
                    // Get the product ID from the clicked button's data attribute
                    var productId = '<?php echo $productId;?>';
                    
                    // Send an Ajax request to store the product ID in cookies
                    $.ajax({
                    type: 'POST',
                    url: 'actions/set_cookies.php', 
                    data: { product_id: productId },
                    success: function(response) {
                        // Redirect to the new webpage
                        window.location.href = 'order_confirm.php';
                    }
                    });
                });
            });
        </script>
        
        <footer class="footer small text-center">
        </footer>
    </body>
</html>
