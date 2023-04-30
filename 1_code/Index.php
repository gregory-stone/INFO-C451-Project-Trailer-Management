
<!--
Trailer Management Index
Gregory Stone
INFO-C451 System Implementation
Trailer Management System Project

-->

<!DOCTYPE html>
<html>
<head>
	<title> LOGIN </title>
	<div id="myStyles">
		<link rel="stylesheet" type="text/css" href="css/TrailerManagement_Styles.css" >
	</div>
</head>

<body>
	<div class='bar'></div>
	<div id='header'>
		<h1>Trailer Management</h1>
	</div>
	<div class='bar'></div>
	<div id="logIn">
	<form action="Login.php" method="POST">
		<?php if(isset($_GET['error'])) { ?>
			<p class="error"> <?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label> Employee ID </label>
		<input type="text" name="username" placeholder="Employee ID"><br/><br/>
		<label> Password</label>
		<input type="password" name="password" placeholder="Password"><br/><br/>
		<button type="submit" class="loginButton">Login</button>
	</form>
	</div>
	<div class='bar'></div>
</body>
</html>