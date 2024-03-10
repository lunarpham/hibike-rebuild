<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>LOGIN</title>
	<link rel="icon" href="logo/logo.webp">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
      integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
      crossorigin="anonymous"></script>
    <link href="css/styles.css" rel="stylesheet">
    <script src="js/scripts.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top nav-default" id="mainNav">
        
    </nav>

	<section class="mt-5 pt-5 d-flex justify-content-center">
		<div class="container d-flex justify-content-center mt-5 pt-5">
			<form action="login.php" method="post" class="mt-5 p-4 bg-white border-pink rounded-4 text-center form-floating  col-md-4">
				<h2 class="primary-bold mb-4">LOGIN</h2>
				<?php if (isset($_GET['error'])) { ?>
					<p class="error"><?php echo $_GET['error']; ?></p>
				<?php } ?>

				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="username" placeholder="Username" name="Username">
					<label for="username">Username</label>
				</div>

				<div class="form-floating mb-3">
					<input type="password" class="form-control" id="password" placeholder="Password" name="Password">
					<label for="password">Password</label>
				</div>

				<button type="submit" class="btn btn-primary fs-6 primary-bold w-100">Login</button>
			</form>
		</div>
	</section>

	<footer class="footer small text-center">
    </footer>
	
</body>
</html>