<?php
    require_once('database.php');

    // Fetch items from the shop table
    $query = "SELECT i.id, i.name, i.price, i.type, i.brand, COUNT(o.id) AS purchases, i.image, i.description
    FROM instruments AS i
    LEFT JOIN orders AS o ON i.name = o.product_name
    GROUP BY i.id, i.name, i.price, i.type, i.brand, i.image, i.description";
    $result = $conn->query($query);

    // Fetch results and store in a PHP array
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Convert price to integer if the value after the decimal is equal to zero
            $price = $row['price'];
            $price = ($price - floor($price) == 0) ? intval($price) : $price;
            $row['price'] = $price;

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
