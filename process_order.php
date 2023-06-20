<?php
// Include the database.php file
require_once 'database.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve order details from the POST request
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $country = $_POST['country'];

    // Retrieve the product details from the previous page
    $productId = $_COOKIE['product_id'];
    // Fetch other product details based on the product ID
    $sql = "SELECT * FROM instruments WHERE id = $productId";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result && $result->num_rows > 0) {
        $productDetails = $result->fetch_assoc();

        // Access the retrieved product details
        $productName = $productDetails['name'];
        $price = $productDetails['price'];

        // Generate a unique order ID
        $orderId = uniqid();

        // Insert the order details into the database
        $insertSql = "INSERT INTO orders (id, order_date, product_name, price, buyer_name, address, email)
                      VALUES ('$orderId', NOW(), '$productName', $price, '$name', '$address', '$email')";
        if ($conn->query($insertSql) === TRUE) {
            // Order saved successfully, you can redirect to a confirmation page
            header('Location: confirmation.html');
            exit;
        } else {
            // Error occurred while saving the order
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Product not found.";
    }
}

// Close the database connection
$conn->close();
?>
