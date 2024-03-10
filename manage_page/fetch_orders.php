<?php
    require_once('database.php');

    // Select data from the source table
    $sqlSelect = "SELECT * FROM orders";
    $result = $conn->query($sqlSelect);

    // Fetch results and store in a PHP array
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Convert price to integer if the value after the decimal is equal to zero
            $product_price = $row['product_price'];
            $product_price = ($product_price - floor($product_price) == 0) ? intval($product_price) : $product_price;
            $row['product_price'] = $product_price;

            $data[] = $row;
        }
    }

    // Close the database connection
    $conn->close();

    // Set the response header as JSON
    header('Content-Type: application/json');

    // Convert PHP array to JSON string and echo the result
    echo json_encode($data);
?>

