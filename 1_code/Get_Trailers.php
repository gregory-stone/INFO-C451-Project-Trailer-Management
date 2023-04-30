<?php
/*
Trailer Management Get Trailers
Gregory Stone
INFO-C451 System Implementation
Trailer Management System Project
*/
	include_once("Company_Class.php");
		
	$myCompany = new Company("localhost","TMadmin","admin","trailer_management");
	if($_SESSION['role'] == 'Gatekeeper') {
		$myCompany->DisplayTrailersGatekeeper();
	} elseif($_SESSION['role'] == 'Spotter') {
		$myCompany->DisplayTrailersSpotter();
	} elseif($_SESSION['role'] == 'Operator') {
		$myCompany->DisplayTrailersOperator();
	} else {
	$myCompany->DisplayTrailers();
	}
	
?>