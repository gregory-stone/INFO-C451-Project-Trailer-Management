<?php
/*
Trailer Management Database Connection
Gregory Stone
INFO-C451 System Implementation
Trailer Management System Project
*/
	
	$conn=mysqli_connect("localhost", "TMadmin", "admin", "trailer_management");
	
	if(!$conn) {
		echo "Connection Failed";
	}
	
	
?>