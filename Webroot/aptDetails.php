<?php

	require_once("conn/connApts.php");
	// get variable from 
	$aptID = $_GET['aptID'];

	$query = "SELECT * From apartments, buildings WHERE IDapt='$aptID'
	AND apartments.bldgID = buildings.IDbldg";
	$result = mysqli_query($conn, $query);
	
	// Store the row retrieved from the database
	$row = mysqli_fetch_array($result);

	//echo $row['bldgName];
	//echo $row['address'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Details for Apartment <?php echo $row['apt'];?>, <?php echo $row['bldgName'];?></title>
	<link href="css/apts.css" rel="stylesheet">
	<script>
		function goBack(){ window.history.back();}
	</script>
</head>

<body>
	
<!-- 4 row 3 column table 
	NAME 	NAME 	NAME
	IMG 	FLOORS 	YEARBUILT
	IMG 	DESC 	DESC
	ADDRESS	PHONE	EMAIL
-->
	<table>
		<tr>
			<td colspan="3">
				<h1>Apartment <?php echo $row['apt'];?>, 
					<a href="bldgDetails.php?bldgID=<?php echo $row['bldgID']; ?>">
							<?php echo $row['bldgName']; ?>
					</a>
				</h1>
			</td>
		</tr>
		
		<tr>
			<td rowspan="2">
				<img src="images/propPics/HaverfordPlaceApt2.jpg">
			</td>
			<td>Bedrooms: <?php echo $row['bdrms'] == 0 ? 'Studio' : $row['bdrms'];?></td> <!--tertiary to show either studio or number of bedrooms -->
			<td>Rent: $<?php echo number_format($row['rent']);?></td>
		</tr>
		
		<tr>
			<td colspan="2"><?php echo $row['aptDesc'];?></td>
		</tr>
		
		<tr>
			<td>Square Ft: <?php echo $row['sqft'];?></td>
			<td>Baths: <?php echo $row['baths'];?></td>
			<td>Status: <?php echo $row['isAvail'] == 1 ? 'Available' : 'Occupied';?></td> <!--tertiary statement for status -->
		</tr>
	</table>
	<button type="button" onclick="goBack()">Back to Search Results</button>

</body>
</html>