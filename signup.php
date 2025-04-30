<?php include('inc/head.php'); ?>
<body>
	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<a href="index.php" class="navbar-brand mr-3">Simple Online Leave Management</a>
		</div>
	</nav>

	<header id="main-header" class="bg-primary py-2 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1><i class="fa fa-user-plus"></i> Register</h1>
				</div>
			</div>
		</div>
	</header>

	<section id="register" class="py-4 mb-4 bg-faded">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="card">
						<div class="card-header">
							<h5>Create an Account</h5>
						</div>
						<div class="card-body p-3">
							<form action="" method="POST">
								<label>Name</label>
								<input type="text" name="name" class="form-control" required>
								<br />
								<label>Email</label>
								<input type="email" name="email" class="form-control" required>
								<br />
								<label>Password</label>
								<input type="password" name="password" class="form-control" required>
								<br />
								<label>Confirm Password</label>
								<input type="password" name="cpassword" class="form-control" required>
								<br />
								<input type="submit" name="register" class="btn btn-success btn-block" value="Register">
							</form>
							<p class="mt-2 text-center">Already have an account? <a href="index.php">Login here</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/tether.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php 
	if (isset($_POST['register'])) {
		include 'inc/config.php';

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];

		if ($password !== $cpassword) {
			echo "<script>alert('Passwords do not match');</script>";
		} else {
			$hashed = md5($password);
			$check_email = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
			
			if (mysqli_num_rows($check_email) > 0) {
				echo "<script>alert('Email already exists. Try logging in.');</script>";
			} else {
				$query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed')";
				if (mysqli_query($con, $query)) {
					echo "<script>alert('Registration successful! You can now log in.'); window.location='index.php';</script>";
				} else {
					echo "<script>alert('Error occurred while registering');</script>";
				}
			}
		}
	}
?>
