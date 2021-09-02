<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<title>Cagayan Tourist Spot | Register</title>
<head>
	
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background:url(../images/20.jpg) no-repeat 0px 0px; background-size:cover; padding-top: 30px;">
	

<div class="container">
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Name</label>
			<input type="text" placeholder="Name" name="username" value="<?php echo $username; ?>">
		</div>
	
		<div class="input-group">
			<label>Email</label>
			<input type="email" placeholder="Email" name="email"  id="email" value="<?php echo $email; ?>">
			
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" placeholder="Password">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" placeholder="Password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</div>
</body>
</html>