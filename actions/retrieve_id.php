<?php
// Include the database.php file
require_once 'database.php';

// Retrieve the product ID from the cookie
$productId = $_COOKIE['product_id'];

if ($productId == 0) {
    $id = "0";
    $name = "N/A";
    $type = "N/A";
    $brand = "N/A";
    $price = "0";
    $image = "N/A";
} else {
    $productRetrieve = "SELECT * FROM instruments WHERE id = $productId";
    $productResult = $conn->query($productRetrieve);

    // Check if the query was successful
    if ($productResult && $productResult->num_rows > 0) {
        $productDetails = $productResult->fetch_assoc();

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
}

// Fetch other product details based on the product ID


?>