<?php
  $regionConnect = "SELECT * FROM regions";
  $regionResult = $conn->query($regionConnect);
  $conn->close();
?>