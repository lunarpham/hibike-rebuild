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

	$uname = validate($_POST['Username']);
	$pass = validate($_POST['Password']);

	if (empty($uname)) {
		header("Location: login_form.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login_form.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM admin WHERE Username='$uname' AND Password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Username'] === $uname && $row['Password'] === $pass) {
            	$_SESSION['Username'] = $row['Username'];
            	$_SESSION['Displayname'] = $row['Displayname'];
            	$_SESSION['ID'] = $row['ID'];
				setcookie('loggedIn', 'true', time() + 86000, '/');
            	header("Location: admin.php");
		        exit();
            }else{
				header("Location: login_form.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: login_form.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: login_form.php");
	exit();
}