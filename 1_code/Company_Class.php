<?php

/*
Trailer Management Company Class
Gregory Stone
INFO-C451 System Implementation
Trailer Management System Project
*/
echo("<link rel='stylesheet' type='text/css' href='css/TrailerManagement_Styles.css' >");


session_start();
class Company {
	private $HostName; 
	private $UserID;
	private $Password;
	private $DBName;
	private $Con; 
	
	//-------------------------------------------------
	public function __construct($host = NULL, $uid = NULL,$pw = NULL, $db = NULL)
	{
		$this->HostName = $host;
		$this->UserID = $uid;
		$this->Password = $pw;
		$this->DBName = $db;
		
		// Connect to Database
		$this->Con = mysqli_connect($host, $uid, $pw, $db);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}
	
	//-------------------------------------------------
	public function __destruct()
	{
		// Close connection
		mysqli_close($this->Con);
	}
	
	//-------------------------------------------------
	public function DisplayTrailersGatekeeper()
	{
		echo("<table border ='5' align='center'>");
		echo("<thead>");
		
		echo("<tr>");
		echo(" 	<th bgcolor='#3BA3D0' width=90px>");
		echo(" 		");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='150px'>");
		echo(" 		TrailerNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0'> ");
		echo(" 		SpotNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0'> ");
		echo(" 		DoorNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='100px'>");
		echo(" 		LoadNo");
		echo(" 	</th>");
		
		echo("</tr>");
		echo("</thead>");
		echo("<tbody>");
		
		$AllTrailers = $this->Get_Trailers_From_DB();
		for($i=0; $i < sizeof($AllTrailers); $i++)
		{
			echo("<tr>");
			echo("  <td style='text-align:center'><a class='checkOutButton' onClick=\"javascript: return confirm('Check-out trailer ". $AllTrailers[$i]['TrailerNo'] ."?');\" href='Delete_Trailer.php?id=".$AllTrailers[$i]['TrailerNo']."'>Check-Out</a></td>");
			echo(" 	<td>" . $AllTrailers[$i]['TrailerNo'] ."</td>");
			echo(" 	<td>" . $AllTrailers[$i]['SpotNo'] . "</td>");
			echo(" 	<td>" . $AllTrailers[$i]['DoorNo'] . "</td>");
			echo(" 	<td>" . $AllTrailers[$i]['LoadNo'] . "</td>");
			echo("</tr>");
		}
		echo("</tbody>");
		echo("</table>");
	}
	
	//-------------------------------------------------
	public function DisplayTrailersSpotter()
	{
		echo("<table border ='5' align='center'>");
		echo("<thead>");
		
		echo("<tr>");
		echo(" 	<th bgcolor='#3BA3D0' width='150px'>");
		echo(" 		TrailerNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0'> ");
		echo(" 		SpotNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0'> ");
		echo(" 		DoorNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='100px'>");
		echo(" 		LoadNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0'>");
		echo(" 		Operator");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='45px'/>");
		
		echo("</tr>");
		echo("</thead>");
		echo("<tbody>");
		
		$AllTrailers = $this->Get_Trailers_From_DB();
		for($i=0; $i < sizeof($AllTrailers); $i++)
		{
			echo("<tr>");
			echo("	<form action='Edit_Trailer_Location.php' method='POST' >");
			echo(" 		<td><input type='text' name='trailerNo' style='background-color:#F7F0DF' size='16' value='".$AllTrailers[$i]['TrailerNo']."' readonly></td> ");
			echo(" 		<td><input type='text' name='spotNo' size='2' value='".$AllTrailers[$i]['SpotNo']."'></td>");
			echo(" 		<td><input type='text' name='doorNo' size='2' value='".$AllTrailers[$i]['DoorNo']."' ></td> ");
			echo(" 		<td>" . $AllTrailers[$i]['LoadNo'] . "</td>");
			echo(" 		<td>" . $AllTrailers[$i]['Operator'] . "</td>");
			echo(" 		<td style='text-align:center'><input class='saveButton' type='submit' value='Save'></td>");
			echo("	</form> ");
			echo("</tr>");
		}
		echo("</tbody>");
		echo("</table>");
	}
	
	//-------------------------------------------------
	public function DisplayTrailersOperator()
	{
		echo("<table border ='5' align='center'>");
		echo("<thead>");
		
		echo("<tr>");
		echo(" 	<th bgcolor='#3BA3D0' width='150px'>");
		echo(" 		TrailerNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0'> ");
		echo(" 		DoorNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='100px'>");
		echo(" 		LoadNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0'>");
		echo(" 		Operator");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='45px'/>");
		
		echo("</tr>");
		echo("</thead>");
		echo("<tbody>");
		
		$AllTrailers = $this->Get_Docked_Trailers_From_DB();
		for($i=0; $i < sizeof($AllTrailers); $i++)
		{
			echo("<tr>");
			echo("	<form action='Edit_Trailer_Load.php' method='POST' >");
			echo(" 		<td><input type='text' name='trailerNo' style='background-color:#F7F0DF' size='16' value='".$AllTrailers[$i]['TrailerNo']."' readonly></td> ");
			echo(" 		<td style='text-align:center'>" . $AllTrailers[$i]['DoorNo'] . "</td>");
			echo(" 		<td><input type='text' name='loadNo' size='9' value='".$AllTrailers[$i]['LoadNo']."'></td> ");
			echo(" 		<td><input type='text' name='operator' size='5' value='".$AllTrailers[$i]['Operator']."'></td>");
			echo(" 		<td style='text-align:center'><input class='saveButton' type='submit' value='Save'></td>");
			echo("	</form> ");
			echo("</tr>");
		}
		echo("</tbody>");
		echo("</table>");
	}
	
	//-------------------------------------------------
	public function DisplayTrailers()
	{
		echo("<table border ='5' align='center'>");
		echo("<thead>");
		
		echo("<tr>");
		echo(" 	<th bgcolor='#3BA3D0' width='150px'>");
		echo(" 		TrailerNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0'> ");
		echo(" 		SpotNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0'> ");
		echo(" 		DoorNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='100px'>");
		echo(" 		LoadNo");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0'>");
		echo(" 		Operator");
		echo(" 	</th>");
		
		echo("</tr>");
		echo("</thead>");
		echo("<tbody>");
		
		$AllTrailers = $this->Get_Trailers_From_DB();
		for($i=0; $i < sizeof($AllTrailers); $i++)
		{
			echo("<tr>");
			echo(" 	<td>" . $AllTrailers[$i]['TrailerNo'] ."</td>");
			echo(" 	<td>" . $AllTrailers[$i]['SpotNo'] . "</td>");
			echo(" 	<td>" . $AllTrailers[$i]['DoorNo'] . "</td>");
			echo(" 	<td>" . $AllTrailers[$i]['LoadNo'] . "</td>");
			echo(" 	<td>" . $AllTrailers[$i]['Operator'] . "</td>");
			echo("</tr>");
		}
		echo("</tbody>");
		echo("</table>");
	}
	
	//-------------------------------------------------
	public function DisplayUsers()
	{
		echo("<table border ='5' align='left'>");
		echo("<thead>");
		
		echo("<tr>");
		echo(" 	<th colspan='5' bgcolor='#3BA3D0'>");
		echo(" 		Users");
		echo("	</th>");
		echo("</tr>");
		
		echo("<tr>");
		echo(" 	<th bgcolor='#3BA3D0' width=20px>");
		echo(" 		");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' align='left' width=35px>");
		echo(" 		ID");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' align='left' width=130px> ");
		echo(" 		Name");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' align='left' width=80px> ");
		echo(" 		Role");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width=45px>");
		echo(" 		");
		echo(" 	</th>");
		
		echo("</tr>");
		echo("</thead>");
		echo("<tbody>");
		
		$AllUsers = $this->Get_Users_From_DB();
		for($i=0; $i < sizeof($AllUsers); $i++)
		{
			echo("<tr>");
			echo("	<form action='Edit_User.php' method='POST' >");
			echo("  	<td style='text-align:center'><a class='deleteButton' onClick=\"javascript: return confirm('Delete " . $AllUsers[$i]['WRole'] ." ". $AllUsers[$i]['EmployeeId'] ." - ". $AllUsers[$i]['Name']."?');\" href='Delete_User.php?id=".$AllUsers[$i]['EmployeeId']."'>X</a></td>");
			echo(" 		<td><input type='text' name='empId' style='background-color:#F7F0DF' size='1' value='".$AllUsers[$i]['EmployeeId']."' readonly></td> ");
			echo(" 		<td><input type='text' name='name' size='14' value='". $AllUsers[$i]['Name'] . "'></td>");
			echo(" 		<td><input type='text' name='wRole' size='7' value='". $AllUsers[$i]['WRole'] . "'></td>");
			echo(" 		<td style='text-align:center'><input class='saveButton' type='submit' value='Save'></td>");
			echo("	</form> ");
			echo("</tr>");
		}
		echo("</tbody>");
		echo("</table>");
	}
	
	//-------------------------------------------------
	public function EditUser()
	{
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		}
		else
		{
			echo("<h3> Edit user info </h3>");
			
			$empId = $_POST['empId'];
			$name = $_POST['name'];
			$wRole = $_POST['wRole'];
						
			$sql = "UPDATE employee 
					SET FName = SUBSTRING_INDEX('$name', ' ', 1),
						LName = SUBSTRING_INDEX('$name', ' ', -1),
						WRole = '$wRole'
					WHERE EmployeeId = '$empId';";
					
			if (mysqli_query($this->Con,$sql)) {
				header('Location: Get_Users.php');
			} else {
				echo "Error: " . mysqli_error($this->Con) ." <br />";
			}
		}
	}
	
	//-------------------------------------------------
	public function DisplayParkingLocations()
	{
		echo("<table border ='5' align='left'>");
		echo("<thead>");
		
		echo("<tr>");
		echo(" 	<th colspan='4' bgcolor='#3BA3D0'>");
		echo(" 		Dock Doors");
		echo("	</th>");
		echo("</tr>");
		
		echo("<tr>");
		echo(" 	<th bgcolor='#3BA3D0' width='75px' align='left'>");
		echo(" 		Door");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0'> ");
		echo(" 		Ship/Rec");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0'> ");
		echo(" 		Active");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='100px' align='left'>");
		echo(" 		Trailer");
		echo(" 	</th>");
		
		echo("</tr>");
		echo("</thead>");
		
		echo("<tbody>");
		
		$AllDoors = $this->Get_Dock_Doors_From_DB();
		for($i=0; $i < sizeof($AllDoors); $i++)
		{
			echo("<tr>");
			echo(" 	<td>" . $AllDoors[$i]['DoorNo'] ."</td>");
			echo(" 	<td>" . $AllDoors[$i]['ShipOrRec'] . "</td>");
			echo(" 	<td style='text-align:center'>");
			if ($AllDoors[$i]['Active'] == 1){
				echo "&#10003;";
			}
			echo("</td>");
			echo(" 	<td>" . $AllDoors[$i]['TrailerNo'] . "</td>");
			echo("</tr>");
		}
		echo("</tbody>");
		echo("</table>");
		
		echo("<table border ='5' align='right'>");
		echo("<thead>");
		
		echo("<tr>");
		echo(" 	<th colspan='4' bgcolor='#3BA3D0'>");
		echo(" 		Parking Spots");
		echo("	</th>");
		echo("</tr>");
		
		echo("<tr>");
		echo(" 	<th bgcolor='#3BA3D0' width='75px' align='left'>");
		echo(" 		Spot");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0'> ");
		echo(" 		Active");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='100px' align='left'>");
		echo(" 		Trailer");
		echo(" 	</th>");
		
		echo("</tr>");
		echo("</thead>");
		
		echo("<tbody>");
		
		$AllSpots = $this->Get_Parking_Spots_From_DB();
		for($i=0; $i < sizeof($AllSpots); $i++)
		{
			echo("<tr>");
			echo(" 	<td>" . $AllSpots[$i]['SpotNo'] ."</td>");
			echo(" 	<td style='text-align:center'>");
			if ($AllSpots[$i]['Active'] == 1){
				echo "&#10003;";
			}
			echo("</td>");
			echo(" 	<td>" . $AllSpots[$i]['TrailerNo'] . "</td>");
			echo("</tr>");
		}
		echo("</tbody>");
		echo("</table>");
	}
	
	//-------------------------------------------------
	public function DisplayDockDoors()
	{
		echo("<table border ='5' align='left'>");
		echo("<thead>");
		
		echo("<tr>");
		echo(" 	<th colspan='6' bgcolor='#3BA3D0'>");
		echo(" 		Dock Doors");
		echo("	</th>");
		echo("</tr>");
		
		echo("<tr>");
		echo(" 	<th bgcolor='#3BA3D0' width=15px>");
		echo(" 		");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' align='left' width='35px'>");
		echo(" 		Door");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='40px'> ");
		echo(" 		Ship/<br/>Rec");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='50px'> ");
		echo(" 		Active");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='100px'>");
		echo(" 		Trailer");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='45px'/>");
		
		echo("</tr>");
		echo("</thead>");
		
		echo("<tbody>");
		
		$AllDoors = $this->Get_Dock_Doors_From_DB();
		for($i=0; $i < sizeof($AllDoors); $i++)
		{
			echo("<tr>");
			echo("	<form action='Edit_Dock_Door.php' method='POST' >");
			echo("  	<td style='text-align:center'><a class='deleteButton' onClick=\"javascript: return confirm('Delete dock door " . $AllDoors[$i]['DoorNo'] ."?');\" href='Delete_Dock_Door.php?id=".$AllDoors[$i]['DoorNo']."'>X</a></td>");
			echo(" 		<td><input type='text' name='doorNo' style='background-color:#F7F0DF' size='1' value='".$AllDoors[$i]['DoorNo']."' readonly></td> ");
			echo(" 		<td><input type='text' name='shipRec' size='1' value='".$AllDoors[$i]['ShipOrRec'] . "'></td>");			
			echo(" 		<td bgcolor='#EEEEEE' style='text-align:center'>");
							if ($AllDoors[$i]['Active'] == '1') {
								echo("<input type='checkbox' name='active' value='1' checked='checked' /></td>");
							}else{
								echo("<input type='checkbox' name='active' value='1' /></td>");
							}
			echo(" 		<td>" . $AllDoors[$i]['TrailerNo'] . "</td>");
			echo(" 		<td style='text-align:center'><input class='saveButton' type='submit' value='Save'></td>");
			echo("	</form> ");
			echo("</tr>");
		}
		echo("</tbody>");
		echo("</table>");
	}
	
	//-------------------------------------------------
	public function DisplayParkingSpots()
	{	
		echo("<table border ='5' align='left'>");
		echo("<thead>");
		
		echo("<tr>");
		echo(" 	<th colspan='5' bgcolor='#3BA3D0'>");
		echo(" 		Parking Spots");
		echo("	</th>");
		echo("</tr>");
		
		echo("<tr>");
		echo(" 	<th bgcolor='#3BA3D0' width=15px>");
		echo(" 		");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='35px'>");
		echo(" 		Spot");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='50px'> ");
		echo(" 		Active");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='100px'>");
		echo(" 		Trailer");
		echo(" 	</th>");
		
		echo(" 	<th bgcolor='#3BA3D0' width='45px'/>");
		
		echo("</tr>");
		echo("</thead>");
		
		echo("<tbody>");
		
		$AllSpots = $this->Get_Parking_Spots_From_DB();
		for($i=0; $i < sizeof($AllSpots); $i++)
		{
			echo("<tr>");
			echo("	<form action='Edit_Parking_Spot.php' method='POST' >");
			echo("  	<td style='text-align:center'><a class='deleteButton' onClick=\"javascript: return confirm('Delete parking spot " . $AllSpots[$i]['SpotNo'] ."?');\" href='Delete_Parking_Spot.php?id=".$AllSpots[$i]['SpotNo']."'>X</a></td>");
			echo(" 		<td><input type='text' name='spotNo' style='background-color:#F7F0DF' size='1' value='".$AllSpots[$i]['SpotNo']."' readonly></td> ");
			echo(" 		<td bgcolor='#EEEEEE' style='text-align:center'>");
							if ($AllSpots[$i]['Active'] == '1') {
								echo("<input type='checkbox' name='active' value='1' checked='checked' /></td>");
							}else{
								echo("<input type='checkbox' name='active' value='1' /></td>");
							}
			echo(" 		<td>" . $AllSpots[$i]['TrailerNo'] . "</td>");
			echo(" 		<td style='text-align:center'><input class='saveButton' type='submit' value='Save'></td>");
			echo("	</form> ");
			echo("</tr>");
		}
		echo("</tbody>");
		echo("</table>");
	}
		
	//-------------------------------------------------
	function DisplayNewUserForm()
	{
		echo("<form action='Add_User.php' method='POST' >");
		echo("	<div id='RegistrationForm' ");
		echo(" 		style= 'background-color:#C3D6C8; ");
		echo("		border:2px solid black; ");
		echo(" 		border-radius: 10px;");
		echo(" 		height:340px; ");
		echo(" 		width:280px; ");
		echo(" 		float:left;'> ");
		
		echo(" 		<h2 align='center'>Add New User</h2> ");
		
		echo("		<table style= 'margin:5px;'> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> First Name </label> </td> ");
		echo(" 				<td> <input type='text' name='fName' size='20' ></td> ");
		echo(" 			</tr> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> Last Name </label> </td> ");
		echo(" 				<td> <input type='text' name='lName' size='20' ></td> ");
		echo(" 			</tr> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> Emp ID </label> </td> ");
		echo(" 				<td> <input type='text' name='empId' size='20' ></td> ");
		echo(" 			</tr> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> Password </label></td> ");
		echo(" 				<td> <input type='text' name='password' size='20' ></td> ");
		echo(" 			</tr> ");		
		echo(" 			<tr> ");
		echo(" 				<td> Permissions</td> ");
		echo(" 				<td> ");
		echo(" 					<fieldset> ");
		echo(" 						<legend><b> Select role: </b> </legend> ");
		$UserRoles = $this->Get_Roles();
		for ($i=0; $i<sizeof($UserRoles); $i++)
		{
			$ID = $UserRoles[$i]['JobTitle'];
			echo("<input type='radio' id='userRole' name='userRole' value='$ID'> ");
			echo("<label for='JobTitle'>$ID</label><br> ");
		}
		echo(" 					</fieldset> ");
		echo("				</td> ");
		echo(" 			</tr> ");
		echo(" 		</table> ");
		echo(" 		<p> </p> ");
		echo(" 		<center> ");
		echo(" 			<input class='saveButton' type='submit' value='Save'>");
		echo(" 		</center> ");
		echo("	</div> ");
		echo("</form> ");
	}
	
	//-------------------------------------------------
	public function AddUser()
	{
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		}
		else
		{
			echo("<h3> User account creation</h3>");
			
			$fName = $_POST['fName'];
			$lName = $_POST['lName'];
			$empId = $_POST['empId'];
			$password = $_POST['password'];
			$userRole = $_POST['userRole'];
			
			$sql = "INSERT INTO `employee` (CompanyId, EmployeeId, FName, LName, WhGln, WRole, Pword)
					VALUES ('1','$empId','$fName','$lName','0123456789123','$userRole','$password');";
					
			if (mysqli_query($this->Con,$sql)) {
				echo "User $empId created for: $fName $lName<br />";
				echo "Permissions level: $userRole<br />";
			} else {
				echo "Error in Registration: " . mysqli_error($this->Con) ." <br />";
			}
		}
	}
	
	//-------------------------------------------------
	public function DeleteUser()
	{
		$empId = $_GET['id'];
		$sql = "DELETE FROM employee WHERE EmployeeId = '$empId'"; 

		if (mysqli_query($this->Con,$sql)) {
			header('Location: Get_Users.php'); 
		} else {
			echo "Error deleting record: " . mysqli_error($this->Con) ." <br />";		
		}
	}	
	
	//-------------------------------------------------
	function DisplayNewDoorForm()
	{
		echo("<form action='Add_Dock_Door.php' method='POST' >");
		echo("	<div id='RegistrationForm' ");
		echo(" 		style= 'background-color:#C3D6C8; ");
		echo("		border:2px solid black; ");
		echo(" 		border-radius: 10px;");
		echo(" 		height:280px; ");
		echo(" 		width:265px; ");
		echo(" 		float:left;'> ");
		
		echo(" 		<h2 align='center'>Add New Dock Door</h2> ");
		
		echo("		<table style= 'margin:5px;'> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> Door </label> </td> ");
		echo(" 				<td> <input type='text' name='doorNo' size='20' ></td> ");
		echo(" 			</tr> ");
		echo(" 			<tr> ");
		echo(" 				<td> Ship/Rec </td> ");
		echo(" 				<td> ");
		echo(" 					<fieldset> ");
		echo(" 						<input type='radio' id='ship' name='shipRec' value='S' checked='checked'> ");
		echo(" 						<label for='ship'>Shipping</label> <br /> ");
		echo(" 						<input type='radio' id='receive' name='shipRec' value='R'> ");
		echo(" 						<label for='receive'>Receiving</label> ");
		echo(" 					</fieldset> ");
		echo(" 				</td> ");
		echo(" 			</tr> ");
		echo(" 			<tr> ");
		echo(" 				<td> Status </td> ");
		echo(" 				<td> ");
		echo(" 					<fieldset> ");
		echo(" 						<input type='radio' id='active' name='active' value='1' checked='checked'> ");
		echo(" 						<label for='ship'>Active</label><br /> ");
		echo(" 						<input type='radio' id='inactive' name='active' value='0'> ");
		echo(" 						<label for='receive'>Inactive</label> ");
		echo(" 					</fieldset> ");
		echo(" 				</td> ");
		echo(" 			</tr> ");
		echo(" 		</table> ");
		echo(" 		<p> </p> ");
		echo(" 		<center> ");
		echo(" 			<input class='saveButton' type='submit' value='Save'>");
		echo(" 		</center> ");
		echo("	</div> ");
		echo("</form> ");
	}	
	
	//-------------------------------------------------
	function DisplayNewSpotForm()
	{
		echo("<form action='Add_Parking_Spot.php' method='POST' >");
		echo("	<div id='RegistrationForm' ");
		echo(" 		style= 'background-color:#C3D6C8; ");
		echo("		border:2px solid black; ");
		echo(" 		border-radius: 10px;");
		echo(" 		height:220px; ");
		echo(" 		width:260px; ");
		echo(" 		float:left;'> ");
		
		echo(" 		<h2 align='center'>Add New Parking Spot</h2> ");
		
		echo("		<table style= 'margin:5px;'> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> Spot </label> </td> ");
		echo(" 				<td> <input type='text' name='spotNo' size='20' ></td> ");
		echo(" 			</tr> ");
		echo(" 			<tr> ");
		echo(" 				<td> Status </td> ");
		echo(" 				<td> ");
		echo(" 					<fieldset> ");
		echo(" 						<input type='radio' id='active' name='active' value='1' checked='checked'> ");
		echo(" 						<label for='ship'>Active</label><br /> ");
		echo(" 						<input type='radio' id='inactive' name='active' value='0'> ");
		echo(" 						<label for='receive'>Inactive</label> ");
		echo(" 					</fieldset> ");
		echo(" 				</td> ");
		echo(" 			</tr> ");
		echo(" 		</table> ");
		echo(" 		<p> </p> ");
		echo(" 		<center> ");
		echo(" 			<input class='saveButton' type='submit' value='Save'>");
		echo(" 		</center> ");
		echo("	</div> ");
		echo("</form> ");
	}
	
	//-------------------------------------------------
	function DisplayEditCompanyForm()
	{
		echo("<form action='Edit_Company.php' method='POST' >");
		echo("	<div id='RegistrationForm' ");
		echo(" 		style= 'background-color:#C3D6C8; ");
		echo("		border:2px solid black; ");
		echo(" 		border-radius: 10px;");
		echo(" 		height:280px; ");
		echo(" 		width:350px; ");
		echo(" 		float:left;'> ");
		
		echo(" 		<h2 align='center'>Edit Company Info</h2> ");
		
		$company = $this->Get_Company_Info_From_DB();
		for($i=0; $i < sizeof($company); $i++)
		{
			echo("	<table style= 'margin:5px;'> ");
			echo(" 		<tr> ");
			echo(" 			<td> <label> Name </label> </td> ");
			echo(" 			<td> <input type='text' name='name' size='30' value='".$company[$i]['Name']."'></td> ");
			echo(" 		</tr> ");
			echo(" 		<tr> ");
			echo(" 			<td> <label> Address 1 </label> </td> ");
			echo(" 			<td> <input type='text' name='address1' size='30' value='". $company[$i]['Street1']."'></td> ");
			echo(" 		</tr> ");
			echo(" 		<tr> ");
			echo(" 			<td> <label> Address 2 </label> </td> ");
			echo(" 			<td> <input type='text' name='address2' size='30' value='".$company[$i]['Street2']."'></td> ");
			echo(" 		</tr> ");
			echo(" 		<tr> ");
			echo(" 			<td> <label> City </label> </td> ");
			echo(" 			<td> <input type='text' name='city' size='30' value='".$company[$i]['City']."'></td> ");
			echo(" 		</tr> ");
			echo(" 		<tr> ");
			echo(" 			<td> <label> State </label> </td> ");
			echo(" 			<td> <input type='text' name='state' size='30' value='".$company[$i]['State']."'></td> ");
			echo(" 		</tr> ");
			echo(" 		<tr> ");
			echo(" 			<td> <label> Zip </label> </td> ");
			echo(" 			<td> <input type='text' name='zip' size='30' value='".$company[$i]['Zip']."'></td> ");
			echo(" 		</tr> ");
			echo(" 	</table> ");
		}
		echo(" 		<p> </p> ");
		echo(" 		<center> ");
		echo(" 			<input class='saveButton' type='submit' value='Save'>");
		echo(" 		</center> ");
		echo("	</div> ");
		echo("</form> ");
	}
	
	//-------------------------------------------------
	public function EditCompany()
	{
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		}
		else
		{
			echo("<h3> Edit company details </h3>");
			
			$name = $_POST['name'];
			$address1 = $_POST['address1'];
			$address2 = $_POST['address2'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
						
			$sql = "UPDATE company 
					SET Name = '$name',
						Street1 = '$address1',
						Street2 = '$address2',
						City = '$city',
						State = '$state',
						Zip = '$zip'
					WHERE CompanyId = '1';";
					
			if (mysqli_query($this->Con,$sql)) {
				echo "Success: Company info updated <br />";
			} else {
				echo "Error: " . mysqli_error($this->Con) ." <br />";
			}
		}
	}
	
	//-------------------------------------------------
	function DisplayNewWarehouseForm()
	{	
		echo("<form action='Add_Warehouse.php' method='POST' >");
		echo("	<div id='RegistrationForm' ");
		echo(" 		style= 'background-color:#C3D6C8; ");
		echo("		border:2px solid black; ");
		echo(" 		border-radius: 10px;");
		echo(" 		height:320px; ");
		echo(" 		width:350px; ");
		echo(" 		float:left;'> ");
		
		echo(" 		<h2 align='center'>Add New Warehouse</h2> ");
	
		echo("		<table style= 'margin:5px;'> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> Gln </label> </td> ");
		echo(" 				<td> <input type='text' name='gln' size='30' ></td> ");
		echo(" 			</tr> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> Name </label> </td> ");
		echo(" 				<td> <input type='text' name='name' size='30' ></td> ");
		echo(" 			</tr> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> Address 1 </label> </td> ");
		echo(" 				<td> <input type='text' name='address1' size='30' ></td> ");
		echo(" 			</tr> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> Address 2 </label> </td> ");
		echo(" 				<td> <input type='text' name='address2' size='30' ></td> ");
		echo(" 			</tr> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> City </label> </td> ");
		echo(" 				<td> <input type='text' name='city' size='30' ></td> ");
		echo(" 			</tr> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> State </label> </td> ");
		echo(" 				<td> <input type='text' name='state' size='30' ></td> ");
		echo(" 			</tr> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> Zip </label> </td> ");
		echo(" 				<td> <input type='text' name='zip' size='30' ></td> ");
		echo(" 			</tr> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> Capacity </label> </td> ");
		echo(" 				<td> <input type='text' name='capacity' size='30' ></td> ");
		echo(" 			</tr> ");
		echo(" 		</table> ");
		echo(" 		<p> </p> ");
		echo(" 		<center> ");
		echo(" 			<input class='saveButton' type='submit' value='Save'>");
		echo(" 		</center> ");
		echo("	</div> ");
		echo("</form> ");
	}
	
	//-------------------------------------------------
	public function AddWarehouse()
	{
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		}
		else
		{
			echo("<h3> Add warehouse </h3>");
			
			$gln = $_POST['gln'];
			$name = $_POST['name'];
			$address1 = $_POST['address1'];
			$address2 = $_POST['address2'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
			$capacity = $_POST['capacity'];
						
			$sql = "INSERT INTO warehouse (Gln, Name, Street1, Street2, City, State, Zip, Capacity, CompanyId)
					VALUES ('$gln','$name','$address1','$address2','$city','$state','$zip','$capacity','1');";
					
			if (mysqli_query($this->Con,$sql)) {
				echo "Success: Warehouse added <br />";
			} else {
				echo "Error: " . mysqli_error($this->Con) ." <br />";
			}
		}
	}
	
	//-------------------------------------------------
	function DisplayEditWarehouseForm()
	{	
		$warehouse = $this->Get_Warehouse_Info_From_DB();
		for($i=0; $i < sizeof($warehouse); $i++)
		{
			echo("<form action='Edit_Warehouse.php' method='POST' >");
			echo("	<div style='height:330px;'> ");
			echo("	<div id='RegistrationForm' ");
			echo(" 		style= 'background-color:#C3D6C8; ");
			echo("		border:2px solid black; ");
			echo(" 		border-radius: 10px;");
			echo(" 		height:320px; ");
			echo(" 		width:350px; ");
			echo(" 		float:left;'> ");
			
			echo(" 		<h2 align='center'>Edit Warehouse Info</h2> ");
		
		
			echo("		<table style= 'margin:5px;'> ");
			echo(" 			<tr> ");
			echo(" 				<td> <label> Gln </label> </td> ");
			echo(" 				<td> <input type='text' name='gln' size='30' style='background-color:#F7F0DF' value='".$warehouse[$i]['Gln']."' readonly></td> ");
			echo(" 			</tr> ");
			echo(" 			<tr> ");
			echo(" 				<td> <label> Name </label> </td> ");
			echo(" 				<td> <input type='text' name='name' size='30' value='".$warehouse[$i]['Name']."'></td> ");
			echo(" 			</tr> ");
			echo(" 			<tr> ");
			echo(" 				<td> <label> Address 1 </label> </td> ");
			echo(" 				<td> <input type='text' name='address1' size='30' value='". $warehouse[$i]['Street1']."'></td> ");
			echo(" 			</tr> ");
			echo(" 			<tr> ");
			echo(" 				<td> <label> Address 2 </label> </td> ");
			echo(" 				<td> <input type='text' name='address2' size='30' value='".$warehouse[$i]['Street2']."'></td> ");
			echo(" 			</tr> ");
			echo(" 			<tr> ");
			echo(" 				<td> <label> City </label> </td> ");
			echo(" 				<td> <input type='text' name='city' size='30' value='".$warehouse[$i]['City']."'></td> ");
			echo(" 			</tr> ");
			echo(" 			<tr> ");
			echo(" 				<td> <label> State </label> </td> ");
			echo(" 				<td> <input type='text' name='state' size='30' value='".$warehouse[$i]['State']."'></td> ");
			echo(" 			</tr> ");
			echo(" 			<tr> ");
			echo(" 				<td> <label> Zip </label> </td> ");
			echo(" 				<td> <input type='text' name='zip' size='30' value='".$warehouse[$i]['Zip']."'></td> ");
			echo(" 			</tr> ");
			echo(" 			<tr> ");
			echo(" 				<td> <label> Capacity </label> </td> ");
			echo(" 				<td> <input type='text' name='capacity' size='30' value='".$warehouse[$i]['Capacity']."'></td> ");
			echo(" 			</tr> ");
			echo(" 		</table> ");
			echo(" 		<p> </p> ");
			echo(" 		<center> ");
			echo(" 			<input class='saveButton' type='submit' value='Save'>");
			echo(" 		</center> ");
			echo("	</div>");
			echo("	</div>");
			echo("</form> ");
		}
	}
	
	//-------------------------------------------------
	public function EditWarehouse()
	{
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		}
		else
		{
			echo("<h3> Edit warehouse details </h3>");
			
			$gln = $_POST['gln'];
			$name = $_POST['name'];
			$address1 = $_POST['address1'];
			$address2 = $_POST['address2'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
			$capacity = $_POST['capacity'];
						
			$sql = "UPDATE warehouse 
					SET Name = '$name',
						Street1 = '$address1',
						Street2 = '$address2',
						City = '$city',
						State = '$state',
						Zip = '$zip',
						Capacity = '$capacity'
					WHERE Gln = '$gln';";
					
			if (mysqli_query($this->Con,$sql)) {
				echo "Success: Warehouse info updated <br />";
			} else {
				echo "Error: " . mysqli_error($this->Con) ." <br />";
			}
		}
	}
	
	//-------------------------------------------------
	public function EditDockDoor()
	{
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		}
		else
		{
			echo("<h3> Edit dock door details </h3>");
			
			$doorNo = $_POST['doorNo'];
			$shipRec = $_POST['shipRec'];
			if (isset($_POST['active'])) {
				$active = 1;
			} else {
				$active = 0;
			}
			$occupiedDoor=$this->Get_Trailer_In_Door($doorNo);
			
			if ($occupiedDoor[0]['TrailerNo']!='' && $active == 0){
				echo("Cannot deactivate occupied dock door ".$doorNo." <br/> Remove trailer ".$occupiedDoor[0]['TrailerNo']." before deactivating door. ");
			}else {		
				$sql = "UPDATE dock_door 
					SET ShipOrRec = '$shipRec',
						Active = '$active'
					WHERE DoorNo = '$doorNo';";
					
				if (mysqli_query($this->Con,$sql)) {
					header('Location: Get_Dock_Doors.php');
				} else {
					echo "Error: " . mysqli_error($this->Con) ." <br />";
				}
			}
		}
	}
	
	//-------------------------------------------------
	public function EditParkingSpot()
	{
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		}
		else
		{
			echo("<h3> Edit parking spot details </h3>");
			
			$spotNo = $_POST['spotNo'];
			if (isset($_POST['active'])) {
				$active = 1;
			} else {
				$active = 0;
			}
			$occupiedSpot=$this->Get_Trailer_In_Spot($spotNo);
			
			if ($occupiedSpot[0]['TrailerNo']!='' && $active == 0){
				echo("Cannot deactivate occupied parking spot ".$spotNo." <br/> Remove trailer ".$occupiedSpot[0]['TrailerNo']." before deactivating spot. ");
			}else {	
						
				$sql = "UPDATE parking_spot 
					SET	Active = '$active'
					WHERE SpotNo = '$spotNo';";
					
				if (mysqli_query($this->Con,$sql)) {
					header('Location: Get_Parking_Spots.php'); 
				} else {
					echo "Error: " . mysqli_error($this->Con) ." <br />";
				}
			}
		}
	}
	
	//-------------------------------------------------
	public function EditTrailerLoad()
	{
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		} else {
			echo("<h3> Edit trailer load </h3>");
			
			$trailerNo = $_POST['trailerNo'];
			if ($_POST['loadNo'] != '' && $_POST['operator'] != ''){
				$loadNo = $_POST['loadNo'];
				$validLoad = $this->Get_Load_Exists($loadNo);
				$trailerLoad = $this->Get_Load_From_DB($loadNo);
				$operator = $_POST['operator'];
				$validOperator = $this->Get_Operator_From_DB($operator);
				if (mysqli_num_rows($validLoad)==0){
					echo("Invalid load number ".$loadNo."");
				} elseif (mysqli_num_rows($trailerLoad)!=0){
					echo("Load already assigned to another trailer.");
				} elseif ($validOperator[0]['WRole']!='Operator'){
					$sql = "UPDATE trailer 
						SET	LoadNo = '$loadNo'
						WHERE TrailerNo = '$trailerNo';";
					if (mysqli_query($this->Con,$sql)) {
						echo("Invalid Operator ID: ".$operator." - ".$validOperator[0]['WRole']."");
					} else {
						echo "Error: " . mysqli_error($this->Con) ." <br />";
					}
				} else {
					$sql = "UPDATE trailer 
						SET	LoadNo = '$loadNo',
							Operator = '$operator'
						WHERE TrailerNo = '$trailerNo';";
				
					if (mysqli_query($this->Con,$sql)) {
						header('Location: Get_Trailers.php'); 
					} else {
						echo "Error: " . mysqli_error($this->Con) ." <br />";
					}
				}
			} elseif ($_POST['loadNo'] != '' && $_POST['operator'] == ''){
				$loadNo = $_POST['loadNo'];
				$validLoad = $this->Get_Load_Exists($loadNo);
				$trailerLoad = $this->Get_Load_From_DB($loadNo);
				if (mysqli_num_rows($validLoad)==0){
					echo("Invalid load number ".$loadNo."");
				} elseif (mysqli_num_rows($trailerLoad)!=0){
					echo("Load already assigned to another trailer.");
				} else {
					$sql = "UPDATE trailer 
						SET	LoadNo = '$loadNo',
							Operator = NULL
						WHERE TrailerNo = '$trailerNo';";
					if (mysqli_query($this->Con,$sql)) {
						header('Location: Get_Trailers.php'); 
					} else {
						echo "Error: " . mysqli_error($this->Con) ." <br />";
					}
				}
			} else {
				$sql = "UPDATE trailer 
					SET	LoadNo = NULL,
						Operator = NULL
					WHERE TrailerNo = '$trailerNo';";
				if (mysqli_query($this->Con,$sql)) {
					header('Location: Get_Trailers.php'); 
				} else {
					echo "Error: " . mysqli_error($this->Con) ." <br />";
				}
			}
		}
	}
	
	//-------------------------------------------------
	public function EditTrailerLocation()
	{	
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		} elseif ($_POST['doorNo'] != '' && $_POST['spotNo'] != '')
		{
			echo("Trailer cannot be located in both a parking spot and a dock door");
		} elseif ($_POST['doorNo'] == '' && $_POST['spotNo'] == '')
		{
			echo("Trailer must be located in either a parking spot or a dock door");
		} else 
		{
			echo("<h3> Edit trailer location </h3>");
			$trailerNo = $_POST['trailerNo'];
			if ($_POST['spotNo'] != '')
			{
				$spotNo = $_POST['spotNo'];
				$validSpot=$this->Get_Spot_Exists($spotNo);
				$activeSpot=$this->Get_Spot_Status_From_DB($spotNo);
				$occupiedSpot=$this->Get_Trailer_In_Spot($spotNo);
				if (mysqli_num_rows($validSpot)==0){
					echo("Invalid parking spot ".$spotNo."");
				} elseif($activeSpot[0]['Active']==0){
					echo("Parking spot ".$spotNo." inactive. Enter active parking spot.");
				} elseif ($occupiedSpot[0]['TrailerNo']!='')
				{
					echo("Parking spot ".$spotNo." occupied by trailer ".$occupiedSpot[0]['TrailerNo'].".<br/> Enter available parking spot.");
				} else 
				{
					$sql = "UPDATE trailer 
						SET	SpotNo = '$spotNo',
							DoorNo = NULL
						WHERE TrailerNo = '$trailerNo';";	
					if (mysqli_query($this->Con,$sql)) 
					{
						header('Location: Get_Trailers.php'); 
					} else 
					{
						echo "Error: " . mysqli_error($this->Con) ." <br />";
					}
				}
			} elseif ($_POST['doorNo'] != '')
			{
				$doorNo = $_POST['doorNo'];
				$validDoor=$this->Get_Door_Exists($doorNo);
				$activeDoor=$this->Get_Door_Status_From_DB($doorNo);
				$occupiedDoor=$this->Get_Trailer_In_Door($doorNo);
				if (mysqli_num_rows($validDoor)==0){
					echo("Invalid dock door ".$doorNo."");
				} elseif($activeDoor[0]['Active']==0)
				{
					echo("Dock door ".$doorNo." inactive. Enter active dock door.");
				} elseif ($occupiedDoor[0]['TrailerNo']!='')
				{
					echo("Dock door ".$doorNo." occupied by trailer ".$occupiedDoor[0]['TrailerNo'].".<br/> Enter available dock door.");
				} else {
					$sql = "UPDATE trailer 
						SET	DoorNo = '$doorNo',
							SpotNo = NULL
						WHERE TrailerNo = '$trailerNo';";
					if (mysqli_query($this->Con,$sql))
					{
						header('Location: Get_Trailers.php'); 
					} else 
					{
						echo "Error: " . mysqli_error($this->Con) ." <br />";
					}
				}
			}		
		}
	}

	//-------------------------------------------------
	public function AddDockDoor()
	{
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		}
		else
		{
			echo("<h3> Dock door creation</h3>");
			
			$doorNo = $_POST['doorNo'];
			$shipRec = $_POST['shipRec'];
			$active = $_POST['active'];
						
			$sql = "INSERT INTO `dock_door` (DoorNo, WhGln, ShipOrRec, Active)
					VALUES ('$doorNo','0123456789123','$shipRec','$active');";
					
			if (mysqli_query($this->Con,$sql)) {
				echo "Success: Dock door $doorNo created <br />";
			} else {
				echo "Error in door creation: " . mysqli_error($this->Con) ." <br />";
			}
		}
	}
	
	//-------------------------------------------------
	public function DeleteDockDoor()
	{
		$doorNo = $_GET['id'];
		$occupiedDoor=$this->Get_Trailer_In_Door($doorNo);
		
		if ($occupiedDoor[0]['TrailerNo']!=''){
			echo("Cannot delete occupied dock door. <br/>Door ".$doorNo." occupied by trailer ".$occupiedDoor[0]['TrailerNo'].".");
		} else {
			$sql = "DELETE FROM dock_door WHERE DoorNo = '$doorNo'"; 
			if (mysqli_query($this->Con,$sql)) {
				header('Location: Get_Dock_Doors.php'); 
			} else {
				echo "Error deleting record: " . mysqli_error($this->Con) ." <br />";		
			}
		}
	}	
	
	//-------------------------------------------------
	public function AddParkingSpot()
	{
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		}
		else
		{
			echo("<h3> Parking spot creation</h3>");
			
			$spotNo = $_POST['spotNo'];
			$active = $_POST['active'];
						
			$sql = "INSERT INTO `parking_spot` (SpotNo, WhGln, Active)
					VALUES ('$spotNo','0123456789123','$active');";
					
			if (mysqli_query($this->Con,$sql)) {
				echo "Success: Parking spot $spotNo created <br />";
			} else {
				echo "Error in spot creation: " . mysqli_error($this->Con) ." <br />";
			}
		}
	}
	
	//-------------------------------------------------
	public function DeleteParkingSpot()
	{
		$spotNo = $_GET['id'];
		$occupiedSpot=$this->Get_Trailer_In_Spot($spotNo);
		
		if ($occupiedSpot[0]['TrailerNo']!=''){
			echo("Cannot delete occupied parking spot. <br/>Parking spot ".$spotNo." occupied by trailer ".$occupiedSpot[0]['TrailerNo'].".");
		} else {
			$sql = "DELETE FROM parking_spot WHERE SpotNo = '$spotNo'"; 
			if (mysqli_query($this->Con,$sql)) {
				header('Location: Get_Parking_Spots.php'); 
			} else {
				echo "Error deleting record: " . mysqli_error($this->Con) ." <br />";		
			}
		}
	}	
	
	//-------------------------------------------------
	function DisplayAppointmentForm()
	{
		echo("<form action='Get_Appointment.php' method='POST' >");
		echo("	<div id='RegistrationForm' align='center'");
		echo(" 		style= 'background-color:#C3D6C8; ");
		echo("		border:2px solid black; ");
		echo(" 		border-radius: 10px;");
		echo(" 		height:340px; ");
		echo(" 		width:280px; ");
		echo(" 		float:left;'> ");
		echo(" 		<h2 >Check-In Trailer</h2> ");
		echo("		<table style= 'margin:5px;'> ");
		echo(" 			<tr> ");
		echo(" 				<td> <label> Load No </label> </td> ");
		echo(" 				<td> <input type='text' name='load' size='10' ></td> ");
		echo(" 			</tr> ");
		echo(" 		</table> ");
		echo(" 		<p style='font-size:x-small'>**Leave blank for empty trailer**</p> ");
		echo(" 		<center> ");
		echo(" 			<input type='submit' class='checkOutButton' value='Check Appointment'>");
		echo(" 		</center> ");
		echo("	</div> ");
		echo("</form> ");
	}
	
	//-------------------------------------------------
	function DisplayNewTrailerForm()
	{
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		}
		else
		{
			$loadNo=$_POST['load'];
			$validLoad = $this->Get_Load_Exists($loadNo);
			$trailerLoad = $this->Get_Load_From_DB($loadNo);
			if (mysqli_num_rows($validLoad)==0 && $loadNo != ''){
					echo("Invalid load number ".$loadNo."");
			} elseif (mysqli_num_rows($trailerLoad)!=0){
					echo("Load already checked in on another trailer");
			} elseif ($loadNo == ''){
					echo("<form action='Add_Empty_Trailer.php' method='POST' >"); 
					echo("	<div id='RegistrationForm' ");
					echo(" 		style= 'background-color:#C3D6C8; ");
					echo("		border:2px solid black; ");
					echo(" 		border-radius: 10px;");
					echo(" 		height:340px; ");
					echo(" 		width:280px; ");
					echo(" 		float:left;'> ");
					echo(" 		<h2 align='center'>Check-In Empty Trailer</h2> ");
					$spot=$this->Get_Last_Open_Spot();
					for($i=0; $i < sizeof($spot); $i++) {
						echo("		<table style= 'margin:5px;'> ");
						echo(" 			<tr> ");
						echo(" 				<td style='width:100px'> <label> Parking Spot </label> </td> ");
						echo(" 				<td> <input type='text' name='spotNo' size='15' value='".$spot[$i]['SpotNo']."'></td> ");
						echo(" 			</tr> ");
						echo(" 			<tr> ");
						echo(" 				<td> <label> Trailer No </label> </td> ");
						echo(" 				<td> <input type='text' name='trailerNo' size='15' ></td> ");
						echo(" 			</tr> ");
						echo(" 		</table> ");
						echo(" 		<p> </p> ");
						echo(" 		<center> ");
						echo(" 			<input class='saveButton' type='submit' value='Save'>");
						echo(" 		</center> ");
					}
					echo("	</div> ");
					echo("</form> ");
			} else {	
				$appointment=$this->Get_Appointment_From_DB($loadNo);
				for($i=0; $i < sizeof($appointment); $i++) {
					echo("<form action='Add_Trailer.php' method='POST' >");
					echo("	<div id='RegistrationForm' ");
					echo(" 		style= 'background-color:#C3D6C8; ");
					echo("		border:2px solid black; ");
					echo(" 		border-radius: 10px;");
					echo(" 		height:340px; ");
					echo(" 		width:280px; ");
					echo(" 		float:left;'> ");
					echo(" 		<h2 align='center'>Check-In Trailer</h2> ");
					echo(" 		<p style='text-align:center;'> Load No: <input type='text' name='loadNo' size='15' style='background-color:#F7F0DF' value='".$loadNo."' readonly></p> ");
					echo(" 		<p style='text-align:center;'><strong> Appointment: ".$appointment[$i]['PlanIn']."</strong></p> ");
					$status=true;
					if ($appointment[$i]['Difference'] < 0) {
						echo(" 		<p style='color:red;font-size:24px;text-align:center;'> <strong>&nbsp; LATE!!!</strong></p> ");
						
					} elseif ($appointment[$i]['Difference'] >= 0 && $appointment[$i]['Difference'] <= 2){
						echo(" 		<p style='color:green;font-size:24px;text-align:center;'> <strong>&nbsp; ON TIME</strong></p> ");
					} else {
						echo(" 		<p style='color:red;font-size:24px;text-align:center;'> <strong>".$appointment[$i]['Difference']." HOURS EARLY!!!</strong></p> ");
						echo(" 		<p style='color:red;font-size:18px;text-align:center;'> <strong>CHECK-IN NOT ALLOWED</strong></p> ");
						$status=false;
					}
					if ($status) {
						$spot=$this->Get_First_Open_Spot();
						for($i=0; $i < sizeof($spot); $i++) {
							echo("		<table style= 'margin:5px;'> ");
							echo(" 			<tr> ");
							echo(" 				<td style='width:100px'> <label> Parking Spot </label> </td> ");
							echo(" 				<td> <input type='text' name='spotNo' size='15' value='".$spot[$i]['SpotNo']."'></td> ");
							echo(" 			</tr> ");
							echo(" 			<tr> ");
							echo(" 				<td> <label> Trailer No </label> </td> ");
							echo(" 				<td> <input type='text' name='trailerNo' size='15' ></td> ");
							echo(" 			</tr> ");
							echo(" 		</table> ");
							echo(" 		<p> </p> ");
							echo(" 		<center> ");
							echo(" 			<input class='saveButton' type='submit' value='Save'>");
							echo(" 		</center> ");
						}
					}
				echo("	</div> ");
				echo("</form> ");
				}
			}
		}
	}
	
	//-------------------------------------------------
	public function AddTrailer()
	{
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		}
		else
		{
			echo("<h3> Trailer Check-In </h3>");
			
			$trailerNo = $_POST['trailerNo'];
			$spotNo = $_POST['spotNo'];
			$loadNo = $_POST['loadNo'];
			
			$sql = "INSERT INTO `trailer` (TrailerNo, SpotNo, LoadNo)
					VALUES ('$trailerNo','$spotNo','$loadNo');";
					
			if (mysqli_query($this->Con,$sql)) {
				echo "Trailer ".$trailerNo." in parking spot ".$spotNo." <br />";
			} else {
				echo "Error in Registration: " . mysqli_error($this->Con) ." <br />";
			}
			
			$sql = "UPDATE load_master
					SET ActualIn = NOW()
					WHERE LoadNo = '$loadNo';";
			date_default_timezone_set('America/Indiana/Indianapolis');

			$date = date('m/j/Y g:i A');			
			if (mysqli_query($this->Con,$sql)) {
				echo $date." <br />";
			} else {
				echo "Error in Registration: " . mysqli_error($this->Con) ." <br />";
			}
		}
	}
	
		//-------------------------------------------------
	public function AddEmptyTrailer()
	{
		if( !isset($_POST) )
		{
			echo("Form was not completed");
		}
		else
		{
			echo("<h3> Empty Trailer Check-In </h3>");
			
			$trailerNo = $_POST['trailerNo'];
			$spotNo = $_POST['spotNo'];
			
			$sql = "INSERT INTO `trailer` (TrailerNo, SpotNo)
					VALUES ('$trailerNo','$spotNo');";
					
			if (mysqli_query($this->Con,$sql)) {
				echo "Trailer ".$trailerNo." in parking spot ".$spotNo." <br />";
			} else {
				echo "Error in Registration: " . mysqli_error($this->Con) ." <br />";
			}
		}
	}
	
	//-------------------------------------------------
	public function DeleteTrailer()
	{
		$trailerNo = $_GET['id'];
		$sql = "DELETE FROM trailer WHERE TrailerNo = '$trailerNo'"; 

		if (mysqli_query($this->Con,$sql)) {
			header('Location: Get_Trailers.php'); 
		} else {
			echo "Error deleting record: " . mysqli_error($this->Con) ." <br />";		
		}
	}
	
	//-------------------------------------------------
	public function DisplayLocation()
	{
		echo("<table height='15px' width='750px' align='left' style='color:#FFFFFF'>");
		
		echo("<tbody>");
		$Location = $this->Get_User_Location_From_DB();
		for($i=0; $i < sizeof($Location); $i++)
		{
			echo("<tr>");
			echo(" 	<td width='200px'>" . $Location[$i]['User'] ."</td>");
			echo(" 	<td width='275px'>" . $Location[$i]['CompName'] ."</td>");
			echo(" 	<td width='275px'>" . $Location[$i]['WhStreet'] . "</td>");
			echo("</tr>");
			echo("<tr>");
			echo(" 	<td >" . $Location[$i]['WRole'] ."</td>");
			echo(" 	<td >" . $Location[$i]['WhName'] ."</td>");
			echo(" 	<td >" . $Location[$i]['WhAddress'] . "</td>");
			echo("</tr>");
		}
		echo("</body>");
		echo("</table>");
	}
		
	//-------------------------------------------------
	public function Get_Dock_Doors_From_DB()
	{
		$sql = "SELECT
				dd.DoorNo,
				dd.ShipOrRec,
				dd.Active,
				tr.TrailerNo
			FROM
				dock_door dd
			LEFT OUTER JOIN trailer tr ON dd.DoorNo = tr.DoorNo
			";
			
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_Parking_Spots_From_DB()
	{
		$sql = "SELECT
				ps.SpotNo,
				ps.Active,
				tr.TrailerNo
			FROM
				parking_spot ps
			LEFT OUTER JOIN trailer tr ON ps.SpotNo = tr.SpotNo
			";
			
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_Trailers_From_DB()
	{
		$sql = "SELECT
				TrailerNo,
				Operator,
				SpotNo,
				SpotWh,
				DoorNo,
				DoorWh,
				LoadNo
			FROM
				trailer
			";
			
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_Docked_Trailers_From_DB()
	{
		$sql = "SELECT
				TrailerNo,
				Operator,
				SpotNo,
				SpotWh,
				DoorNo,
				DoorWh,
				LoadNo
			FROM
				trailer
			WHERE
				DoorNo is not null
			ORDER BY DoorNo
			";
			
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_User_Location_From_DB()
	{
		$EmployeeId=$_SESSION['username'];
		$sql = "SELECT
				CONCAT(emp.FName,' ',emp.LName) as User,
				CONCAT(emp.EmployeeId,' - ',emp.WRole) as WRole,
				comp.Name as CompName,
				wh.Name as WhName,
				CONCAT(wh.Street1,'  ',wh.Street2) as WhStreet,
				CONCAT(wh.City,', ',wh.State,' ',wh.Zip) as WhAddress
			FROM
				employee emp
				INNER JOIN company comp ON emp.CompanyId = comp.CompanyId
				INNER JOIN warehouse wh ON emp.WhGln = wh.Gln
			WHERE
				EmployeeId = '$EmployeeId'";
				
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_Company_Info_From_DB()
	{
		$sql = "SELECT
					Name, 
					Street1, 
					Street2, 
					City, 
					State,
					Zip
				FROM 
					company
				WHERE CompanyId = '1'";
				
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_Warehouse_Info_From_DB()
	{
		$sql = "SELECT
					Gln,
					Name, 
					Street1, 
					Street2, 
					City, 
					State,
					Zip,
					Capacity
				FROM 
					warehouse
				WHERE CompanyId = '1'";
				
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_User_Role_From_DB($EmpId)
	{
		$sql = "SELECT
				WRole
			FROM
				employee
			WHERE
				EmployeeId = '$EmpId'";
				
		$result = mysqli_query($this->Con,$sql);
		return($result);
	}
	
	//-------------------------------------------------
	public function Get_Door_Status_From_DB($DoorNo)
	{
		$sql = "SELECT
				Active
			FROM
				dock_door
			WHERE
				DoorNo = '$DoorNo'";
				
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_Spot_Status_From_DB($SpotNo)
	{
		$sql = "SELECT
				Active
			FROM
				parking_spot
			WHERE
				SpotNo = '$SpotNo'";
				
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_Door_Exists($DoorNo)
	{
		$sql = "SELECT
				DoorNo
			FROM
				dock_door
			WHERE
				DoorNo = '$DoorNo'";
				
		$result = mysqli_query($this->Con,$sql);
		
		return($result);
	}
	
	//-------------------------------------------------
	public function Get_Spot_Exists($SpotNo)
	{
		$sql = "SELECT
				SpotNo
			FROM
				parking_spot
			WHERE
				SpotNo = '$SpotNo'";
				
		$result = mysqli_query($this->Con,$sql);
		
		return($result);
	}
	
	//-------------------------------------------------
	public function Get_Trailer_In_Spot($SpotNo)
	{
		$sql = "SELECT
				TrailerNo
			FROM
				trailer
			WHERE
				SpotNo = '$SpotNo'";
				
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_Trailer_In_Door($DoorNo)
	{
		$sql = "SELECT
				TrailerNo
			FROM
				trailer
			WHERE
				DoorNo = '$DoorNo'";
				
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_Load_From_DB($LoadNo)
	{
		$sql = "SELECT
				TrailerNo, LoadNo
			FROM
				trailer
			WHERE
				LoadNo = '$LoadNo'";
				
		$result = mysqli_query($this->Con,$sql);
		
		return($result);
	}
	
	//-------------------------------------------------
	public function Get_Load_Exists($LoadNo)
	{
		$sql = "SELECT
				LoadNo
			FROM
				load_master
			WHERE
				LoadNo = '$LoadNo'";
				
		$result = mysqli_query($this->Con,$sql);
		
		return($result);
	}
	
	//-------------------------------------------------
	public function Get_Operator_From_DB($EmployeeId)
	{
		$sql = "SELECT
				EmployeeId,
				WRole
			FROM
				employee
			WHERE
				EmployeeId = '$EmployeeId'";
				
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_Appointment_From_DB($LoadNo)
	{
		$sql = "SELECT
				DATE_FORMAT(PlanIn, '%c/%e/%Y %l:%i %p') as PlanIn, 
				TIMESTAMPDIFF(HOUR,NOW(),PlanIn)as Difference
			FROM
				load_master
			WHERE
				LoadNo = '$LoadNo'";
				
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_First_Open_Spot()
	{
		$sql = "SELECT
				ps.SpotNo
			FROM
				parking_spot ps
				LEFT OUTER JOIN	trailer tr ON ps.SpotNo = tr.SpotNo
			WHERE
				ps.Active = 1 AND tr.SpotNo IS NULL
			ORDER BY ps.SpotNo
			LIMIT 1
			";
			
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_Last_Open_Spot()
	{
		$sql = "SELECT
				ps.SpotNo
			FROM
				parking_spot ps
				LEFT OUTER JOIN	trailer tr ON ps.SpotNo = tr.SpotNo
			WHERE
				ps.Active = 1 AND tr.SpotNo IS NULL
			ORDER BY ps.SpotNo DESC
			LIMIT 1
			";
			
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_Users_From_DB()
	{
		$sql = "SELECT
				EmployeeId,
				CONCAT(FName,' ',LName) AS Name,
				WRole
			FROM
				employee
			WHERE EmployeeId <> 'admin'
			";
			
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
	
	//-------------------------------------------------
	public function Get_Roles()
	{
		$sql = "SELECT JobTitle
			FROM warehouse_role";
				
		$result = mysqli_query($this->Con,$sql);
		
		$arrayResult = array();
		
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$arrayResult[] = $row;
		}
		return($arrayResult);
	}
}

?>