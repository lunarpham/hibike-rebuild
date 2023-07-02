<?php

    //Retrieve order ID from cookie 
    $orderId = isset($_COOKIE['order_id']) ? $_COOKIE['order_id'] : '';

    //If order ID is empty, redirect to products page
    if (empty($orderId)) {
        header('Location: ./products.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="icon" href="logo/logo.webp">
        <title>Order Success</title>
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
        <script src="js/scripts.js" defer="sync"></script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-default" id="mainNav">

        </nav>    

        <section id="success_message" class="d-flex justify-content-center">
            <div class="container bg-white border-pink rounded-4 section-wrapper">
                <div class="container-fluid">
                    <div class="section-label text-center pt-5">
                        <h3 class="secondary-med">ORDER PLACED SUCCESSFULLY</h3>
                        <div class="divider d-flex justify-content-center">
                            <div class="divider-bottom"></div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column align-items-center pb-5">
                    <img src="./assests/thankyou.png" alt="" style="width: 15rem;">
                    <h5 class="primary-bold">Thank you for shopping with us.</h5>
                    <p class="mb-1 primary-med">Your order ID is <span id="order_id" class="primary-bold"><?php echo $orderId;?></span></p>
                    <p class="primary-reg">Your order will be delivered in 7-12 business days.</p>
                </div>
            </div>
            
        </section>
        <footer class="footer small text-center text-black-50">
        </footer>
    </body>
</html>
