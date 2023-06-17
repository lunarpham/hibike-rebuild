<?php

// establish connection to db
require_once('database.php');

// get some data from the DB
$sql = "SELECT * FROM instruments";
$result = $conn->query($sql);
$mysqli->close();

?>

