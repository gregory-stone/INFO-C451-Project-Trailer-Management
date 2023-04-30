<!DOCTYPE html>
<html>
<head>
<!--
Trailer Management Settings
Gregory Stone
INFO-C451 System Implementation
Trailer Management System Project
-->
<meta charset="UTF-8">

<!-- ----------- STYLE ---------------->
<div id="myStyles">
	<link rel="stylesheet" type="text/css" href="css/TrailerManagement_Styles.css" >
</div>

<!-- ------- Java Scripts -------------> 
<script>

		

	function rightContent(i)
	{
		document.getElementById("bodyContentSub").innerHTML = "";
		if(i == 1)
			document.getElementById("bodyContentSub").innerHTML = '<object class="contentSub" type="text/html" data="Get_Users.php" ></object>';
		if(i == 2)
			document.getElementById("bodyContentSub").innerHTML = '<object class="contentSub" type="text/html" data="Add_User_Form.php" ></object>';
		if(i == 3)
			document.getElementById("bodyContentSub").innerHTML = '<object class="contentSub" type="text/html" data="Get_Dock_Doors.php" ></object>';
		if(i == 4)
			document.getElementById("bodyContentSub").innerHTML = '<object class="contentSub" type="text/html" data="Add_Dock_Door_Form.php" ></object>';
		if(i == 5)
			document.getElementById("bodyContentSub").innerHTML = '<object class="contentSub" type="text/html" data="Get_Parking_Spots.php" ></object>';
		if(i == 6)
			document.getElementById("bodyContentSub").innerHTML = '<object class="contentSub" type="text/html" data="Add_Parking_Spot_Form.php" ></object>';
		if(i == 7)
			document.getElementById("bodyContentSub").innerHTML = '<object class="contentSub" type="text/html" data="Get_Company.php" ></object>';
		if(i == 8)
			document.getElementById("bodyContentSub").innerHTML = '<object class="contentSub" type="text/html" data="Get_Warehouses.php" ></object>';
		if(i == 9)
			document.getElementById("bodyContentSub").innerHTML = '<object class="contentSub" type="text/html" data="Add_Warehouse_Form.php" ></object>';
		
	}	
</script>
</head>


<body>
<?php
	echo ("<div id='headerSub'>");
		echo ("<h1>Settings</h1>");
	echo ("</div>");
	echo ("<div id='leftNavSub'>");
			echo ("<div id='navLinks'>");
				echo ("<a href='javascript:;' class='pageLinks' onclick='rightContent(1)'>Users</a><br />");
				echo ("- <a href='javascript:;' class='pageLinks' onclick='rightContent(2)'>New User</a><br />");
				echo ("<a href='javascript:;' class='pageLinks' onclick='rightContent(3)'>Dock Doors</a><br />");
				echo ("- <a href='javascript:;' class='pageLinks' onclick='rightContent(4)'>New Dock Door</a><br />");
				echo ("<a href='javascript:;' class='pageLinks' onclick='rightContent(5)'>Parking Spots</a><br />");
				echo ("- <a href='javascript:;' class='pageLinks' onclick='rightContent(6)'>New Parking Spot</a><br />");
				echo ("<a href='javascript:;' class='pageLinks' onclick='rightContent(7)'>Company</a><br />");
				echo ("<a href='javascript:;' class='pageLinks' onclick='rightContent(8)'>Warehouse</a><br />");
				echo ("- <a href='javascript:;' class='pageLinks' onclick='rightContent(9)'>New Warehouse</a><br />");
			echo ("</div>");
		echo ("</div>");
	echo ("<div id='body'>");
		echo ("<div id='bodyContentSub'></div>");
	echo ("</div>");
?>
</body>
</html>