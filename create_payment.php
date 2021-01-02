<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Paymnet Menu</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="header">
		
	</div>
	
	<form method="post" action="create_payment.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Payment Amount (tl)
 </label>
			
		</div>
		
		</div>
		<div class="input-group">
			<label>Choose your Payment Type</label>
			<select name="user_type" id="user_type" >
			
				<option value="due">Due</option>
				<option value="rent">Rent</option>
			</select>
		</div>
		
		
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn"> + Click to Pay!</button>
		</div>
	</form>
</body>
</html>
