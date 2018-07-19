
<?php
error_reporting(-1);
// processor for form on memberJoin.php
// 1.) pass incoming form data to php variables 
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$user = $_POST['user'];
$pswd = $_POST['pswd'];

// 2.) connect to MySQL
$conn = mysqli_connect ('localhost', 'root', 'mysql') or die("Couldn't connect to MySQL");

// 3.) connect to database
mysqli_select_db($conn, 'LoftyHts') or die("Couldn't connect to Database");

// 4.) write out your CRUD "order" (query) -- what you want to do
$query = "INSERT INTO members(firstName, lastName, email, user, pswd) VALUES('$firstName', '$lastName', '$email', '$user', '$pswd')";

// 5.) insert the new record
mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Member Join Procesor</title>
	
</head>
<body>
     
    <h1><?php
		// 6.) give user some feedback
		if(mysqli_affected_rows($conn) == 1){ // mysqli_affected_rows = 1 if it worked
			// welcome
			echo "Welcome $firstName $lastName! Thanks for Joining!";
		} else {
			// sorry
			echo "Sorry, $firstName $lastName! Couldn't sign you up!"; 
		}
	?></h1>

</body>
</html>