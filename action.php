<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the product ID from the Ajax request
  $productId = $_POST['product_id'];

  // Set the product ID in a cookie
  setcookie('product_id', $productId, time() + 3600, '/'); // Modify the expiration time if needed
  
}
?>
