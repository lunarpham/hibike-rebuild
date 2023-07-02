<?php
// Include the database.php file
require_once 'database.php';

// Retrieve the product ID from the cookie
$cookiesId = isset($_COOKIE['product_id']) ? $_COOKIE['product_id'] : '';

if (empty($cookiesId)) {
    header('Location: ./products.php');
    exit();

} else {
    $productRetrieve = "SELECT * FROM instruments WHERE id = $cookiesId";
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

    } else {
        echo "Product not found.";
    }
}

// Fetch other product details based on the product ID


?>