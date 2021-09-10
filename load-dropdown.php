<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dynamic_dropdown";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";


//check which action response accordingly

if($_POST["action"]=="load-country"){    
	echo loadCountry();
}
else if($_POST["action"]=="load-state"){
	echo loadState($_POST["country_id"]);
}

//load country and return country list
function loadCountry(){
	global $conn;
	$sql = "SELECT id, name FROM countries";
	$result = $conn->query($sql);
	$options='<option>select country</option>';
	if ($result->num_rows > 0) {
	  // output data of each row
	  
	  while($row = $result->fetch_object()) {
		$options.= "<option value='$row->id'>$row->name</option>";
	  }
	} 
	return $options;
}

//load state and return state list 
function loadState($country_id){
	global $conn;
	$sql = "SELECT id, name FROM states where country_id='$country_id'";
	$result = $conn->query($sql);
	$options='<option>select state</option>';
	if ($result->num_rows > 0) {
	  // output data of each row
	  
	  while($row = $result->fetch_object()) {
		$options.= "<option value='$row->id'>$row->name</option>";
	  }
	}  
	return $options;
}


$conn->close();
?>

