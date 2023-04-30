<!DOCTYPE html>
<html>
<head>
<!--
Trailer Management
Gregory Stone
INFO-C451 System Implementation
Trailer Management System Project
-->
<title>Trailer Management</title>
<meta charset="UTF-8">

<!-- ----------- STYLE ---------------->
<div id="myStyles">
	<link rel="stylesheet" type="text/css" href="css/TrailerManagement_Styles.css" >
</div>

<!-- ------- Java Scripts -------------> 
<script>

		

	function rightContent(i)
	{
		document.getElementById("bodyContent").innerHTML = "";
		if(i == 1) 
			document.getElementById("bodyContent").innerHTML = '<object class="content" type="text/html" data="Get_Trailers.php" ></object>';
		if(i == 4) 
			document.getElementById("bodyContent").innerHTML = '<object class="content" type="text/html" data="Add_Trailer_Form.php" ></object>';
		if(i == 2)
			document.getElementById("bodyContent").innerHTML = '<object class="content" type="text/html" data="Get_Parking.php" ></object>';	
		if(i == 3)
			document.getElementById("bodyContent").innerHTML = '<object class="content" type="text/html" data="TrailerManagementSettings.php" ></object>';	
	}	
</script>
</head>


<body>
<?php
session_start();
	echo ("<div class='bar'></div>");
	echo ("<div id='header'>");	
		echo ("<h1>Trailer Management</h1>");
	echo ("</div>");
	echo ("<div class='bar'></div>");
	echo ("<div id='userInfo'>");
		echo ("<object width='760px' height='70px' data='Get_Location.php' ></object>");
		echo ("<a href='logout.php' class='logoutButton'>Logout</a>");
	echo ("</div>");
	
	echo ("<div class='bar'></div>");
		echo ("<div>");
			echo ("<div id='leftNav'>");
				echo ("<div id='navLinks'>");
					echo ("<a href='javascript:;' class='pageLinks' onclick='rightContent(1)'>Trailers</a><br />");
					if($_SESSION['role'] == 'Gatekeeper') {
						echo ("- <a href='javascript:;' class='pageLinks' onclick='rightContent(4)'>Check-In Trailer</a><br />");
					}
					echo ("<a href='javascript:;' class='pageLinks' onclick='rightContent(2)'>Parking Locations</a><br />");
					if($_SESSION['role'] == 'Supervisor') {
						echo ("<a href='javascript:;' class='pageLinks' onclick='rightContent(3)'>Settings</a><br />");
					}
				echo ("</div>");
			echo ("</div>");
			echo ("<div id='body'>");
				echo ("<div id='bodyContent'></div>");
			echo ("</div>");
		echo ("</div>");
	echo ("<div class='bar'></div>");
	
	
?>
</body>
</html>