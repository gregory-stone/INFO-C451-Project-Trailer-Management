<?php
/*
Trailer Management Add Empty Trailer
Gregory Stone
INFO-C451 System Implementation
Trailer Management System Project
*/

include_once("Company_Class.php");
	
	$myCompany = new Company("localhost","TMadmin","admin","trailer_management");
	
	
	$myCompany->AddEmptyTrailer();
	



?>