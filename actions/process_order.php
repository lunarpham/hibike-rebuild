<?php
require_once 'database.php';
require_once 'retrieve_id.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve order details from the POST request
    $buyer_name = $_POST['buyer_name'];
    $buyer_email = $_POST['buyer_email'];
    $buyer_phone = $_POST['buyer_phone'];
    $buyer_region = $_POST['buyer_region'];
    $buyer_city = $_POST['buyer_city'];
    $buyer_address = $_POST['buyer_address'];

    $sql = "SELECT UUID() AS order_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $orderId = $row['order_id'];

        // Get the current date and time
        $orderDate = date('Y-m-d H:i:s');

        // Insert the order details into the database
        $sql = "INSERT INTO orders (id, order_date, product_name, product_price, buyer_name, buyer_email, buyer_phone, buyer_region, buyer_city, buyer_address)
                            VALUES ('$orderId', '$orderDate', '$name', '$price', '$buyer_name', '$buyer_email', '$buyer_phone', '$buyer_region', '$buyer_city', '$buyer_address')";

        if ($conn->query($sql) === true) {
            echo "Order placed successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error generating order ID.";
    }
}

// Close the database connection
$conn->close();
?>
