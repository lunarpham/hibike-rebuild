<?php
    $servername = 'fdb1029.awardspace.net';
        
    $username = '4327388_db';
    $database = '4327388_db';
    $password = 'luna1007';


    $conn = new mysqli( $servername,
                        $username,
                        $password,
                        $database);

    if ($conn->connect_error){
        error_log("database.php::Failed to connect to database: " . $conn->connect_error);
        die('connect failed: ' . $conn->connect_error);
    } else {
        error_log("database.php::Connected to database!");
    }
?>