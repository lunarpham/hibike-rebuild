<?php
  // Include the retrieve_id.php file
  require_once 'actions/retrieve_id.php';
  $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="icon" href="logo/logo.webp">
        <title><?php echo $name;?></title>
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
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-default" id="mainNav">

        </nav>

        <section id="productDetails" class="pt-5 mt-5 d-flex justify-content-center">

            <div class="container">
                <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                          <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                          <li class="breadcrumb-item active" aria-current="page"><?php echo $name;?></li>
                        </ol>
                    </nav>
                </div>
                <div class="row row-col-auto">
                    <div class="col d-flex justify-content-center" id="productImage">
                        <img src="<?php echo $image;?>" alt="" style="height:100%">
                    </div>
                    <div class="col px-3 m-2" id="productInfo">
                        <h3 class="product-name fw-bold "><?php echo $name;?></h3>
                        <hr class="style1">
                        <div class="row row-col-auto">
                            <div class="col">
                                <p class="brand-label text-gray-50 primary-bold">Brand</p>
                                <p class="brand-name text-gray-50 primary-bold"><?php echo $brand;?></p>
                            </div>
                            <div class="col">
                                <p class="type-label primary-bold">Type</p>
                                <p class="type-name primary-bold"><?php echo $type;?></p>
                            </div>
                        </div>
                        <hr class="style1">
                        <h3 class="product-price fw-bold">$<?php echo $price;?></h3>
                        <a href="order_confirm.php" class="btn btn-primary rounded-0 buy-now py-3 fw-bold mt-3">BUY NOW</a>
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
                        <p class="primary-reg">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <footer class="footer small text-center">
        </footer>
    </body>
</html>
