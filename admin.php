<?php 
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['Username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['Displayname']; ?></h1>
     <a href="logout.php">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: login_form.php");
     exit();
}
 ?>
