<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_SESSION['product_id'] = $_POST['product_id'];

    $response = array(
      'status' => 'success',
      'message' => 'Information updated successfully'
  );
  echo json_encode($response);
  exit();
}

?>