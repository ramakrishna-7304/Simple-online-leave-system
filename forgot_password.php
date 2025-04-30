<?php include('inc/head.php'); ?>
<body>
	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<a href="index.php" class="navbar-brand mr-3">Simple Online Leave Management</a>
		</div>
	</nav>

	<header id="main-header" class="bg-warning py-2 text-white">
		<div class="container">
			<h1><i class="fa fa-key"></i> Forgot Password</h1>
		</div>
	</header>

	<section class="py-4">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="card">
						<div class="card-header">Reset Your Password</div>
						<div class="card-body">
							<form method="POST">
								<label>Email Address</label>
								<input type="email" name="email" class="form-control" required>
								<br />
								<input type="submit" name="reset" value="Send Reset Link" class="btn btn-warning btn-block">
							</form>
							<p class="mt-2 text-center"><a href="index.php">Back to Login</a></p>
						</div>
					</div>
					<?php
					if (isset($_POST['reset'])) {
						include 'inc/config.php';
						$email = $_POST['email'];
						$result = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
						if (mysqli_num_rows($result) == 1) {
							// You can add email sending logic here
							echo "<script>alert('Password reset link (simulated) has been sent to your email.');</script>";
						} else {
							echo "<script>alert('Email not found in system.');</script>";
						}
					}
					?>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
