<?php
/*
Trailer Management Logout
Gregory Stone
INFO-C451 System Implementation
Trailer Management System Project
*/

	session_start();
	session_unset();
	session_destroy();

	header("Location: index.php");

?>