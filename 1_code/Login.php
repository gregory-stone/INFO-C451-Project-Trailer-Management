<?php
/*
Trailer Management Login
Gregory Stone
INFO-C451 System Implementation
Trailer Management System Project
*/

session_start();
include "db_conn.php";

	if(isset($_POST['username']) && isset($_POST['password'])) {
		function validate($data) {
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
	}
	
	$uname=validate($_POST['username']);
	$pass=validate($_POST['password']);
	
	if(empty($uname)) {
		header ("Location: index.php?error=Username is required");
		exit;
	}
	elseif(empty($pass)) {
		header ("Location: index.php?error=Password is required");
		exit;
	}
	
	$sql = "SELECT * FROM employee WHERE EmployeeId='$uname' AND Pword='$pass'";
	
	$result=mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result) === 1) {
		$row=mysqli_fetch_assoc($result);
		if($row['EmployeeId'] === $uname && $row['Pword'] === $pass) {
			$_SESSION['username'] = $row['EmployeeId'];
			$_SESSION['role'] = $row['WRole'];
			header("Location: TrailerManagement.php");
		}
		else {
			header("Location: index.php?error=Incorrect Username or Password");
			exit;
		}
	}
	else {
		header("Location: index.php?error=Incorrect Username or Password");
		exit;
	}

?>