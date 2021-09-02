<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cagayan Tourist Spot | Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background:url(../images/20.jpg) no-repeat 0px 0px; background-size:cover; padding-top: 30px;">

<div class="container" style="padding-top: 100px;">
	<div class="header">
		<h2>Log in</h2>
	</div>

	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" placeholder="Email@Email.com" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password"  placeholder="Password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>

</div>s
</body>
</html>