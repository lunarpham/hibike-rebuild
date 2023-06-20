<?php 
session_start(); 
include "database.php";

if (isset($_POST['Username']) && isset($_POST['Password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data); 
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['Username']);
	$pass = validate($_POST['Password']);

	if (empty($username)) {
		header("Location: index.php?error=Username is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM Accounts WHERE Username='$username' AND Password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Username'] === $username && $row['Password'] === $pass) {
            	$_SESSION['Username'] = $row['Username'];
            	$_SESSION['Displayname'] = $row['Displayname'];
            	$_SESSION['ID'] = $row['ID'];
            	header("Location: homepage.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect Username or Password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect Username or Password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}