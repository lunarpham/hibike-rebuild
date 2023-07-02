<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["submitName"];
  $email = $_POST["submitEmail"];
  $subject = $_POST["submitSubject"];
  $message = $_POST["submitMessage"];
  
  // Database configuration
  $servername = "fdb1029.awardspace.net";
  $username = "4327388_db";
  $password = "luna1007";
  $dbname = "4327388_db";
  
  // Create a new PDO instance
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  
  
  // Prepare the SQL statement
  $stmt = $conn->prepare("INSERT INTO requests (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
  
  // Bind the parameters
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':message', $message);
  $stmt->bindParam(':subject', $subject);
  
  // Execute the statement
  if ($stmt->execute()) {
    echo "<script>alert('Thank you for contacting us! We will get back to you shortly.');</script>";
    echo "<script>window.location.href = 'contact.html';</script>";
  } else {
    echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
    echo "<script>window.location.href = 'contact.html';</script>";
  }
}
?>