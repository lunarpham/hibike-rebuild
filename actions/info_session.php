<?php

session_start();
  
  // Check if the form is submitted
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Process and validate the input data
  
      // Store the input data in session variables
      $_SESSION['buyer_name'] = $_POST['buyer_name'];
      $_SESSION['buyer_email'] = $_POST['buyer_email'];
      $_SESSION['buyer_phone'] = $_POST['buyer_phone'];
      $_SESSION['buyer_region'] = $_POST['buyer_region'];
      $_SESSION['buyer_city'] = $_POST['buyer_city'];
      $_SESSION['buyer_address'] = $_POST['buyer_address'];
  
      $response = array(
        'status' => 'success',
        'message' => 'Information updated successfully'
    );
    echo json_encode($response);
    exit();
  }
?>