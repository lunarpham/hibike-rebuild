<?php
    require_once 'database.php';

    // Check if the request is a POST request
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the form values
        $itemName = $_POST['name'];
        $itemPrice = $_POST['price'];
        $itemType = $_POST['type'];
        $itemBrand = $_POST['brand'];
        $itemImage = $_POST['image'];
        $itemDescription = $_POST['description'];
        
        // Prepare and execute the SQL statement to insert data into the database
        $sql = "INSERT INTO instruments (name, type, brand, price, image, description)
                VALUES ('$itemName', '$itemType', '$itemBrand', '$itemPrice', '$itemImage', '$itemDescription')";
        
        if ($conn->query($sql) === true) {
            echo "Item added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    // Close the database connection
    $conn->close();
?>
