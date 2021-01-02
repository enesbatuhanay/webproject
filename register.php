<?php include('functions.php') ?>



<form method="post" action="register.php">
	<?php echo display_error(); ?>

</form>







<!DOCTYPE html>
<html>

<head>
	<title></title><link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
	<h2>Register</h2>
</div>
<form method="post" action="register.php">
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
		
	</div>
	<div class="input-group">
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $name; ?>">
		
	</div>
	<div class="input-group">
		<label>Surname</label>
		<input type="text" name="surname" value="<?php echo $surname; ?>">
		
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	<p>
		Did you registered before? <a href="login.php">Log in</a>
	</p>
</form>
</body>

</html>