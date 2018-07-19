<?php
	require_once("conn/connApts.php");
	$query = "SELECT IDbldg, bldgName FROM buildings
	ORDER BY bldgName ASC";
	$result = mysqli_query($conn, $query);
	echo mysqli_error($conn); // check to see if we have any errors
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Apartment Search</title>
	<link href="css/apts.css" rel="stylesheet">
	
</head>
<body>
	<div id="container">
		<h1 align="center">Apartment Search</h1><hr>
		<!-- We use 'get' here because we are only getting information. 

		We used 'post' previously -->

		<form method="get" action="searchAptsProc.php" onsubmit="return validateMinMaxRent()">
			
			<p>Keyword Search: <input type="search" name="search" id="search"></p>
			
			<p>Select Building:<br> 
				<select name="bldgID" id="bldgID">
					<option value="-1" >Any</option>
					<?php
						while($row = mysqli_fetch_array($result)){
							echo '<option value="'. $row['IDbldg'] . 
							'">' . $row['bldgName'] . '</option>';
						}
					?>
				</select>
			</p>

			<p>Select Minimum Rent:<br> 
				<select name="minRent" id="minRent">
					<option value="0">Any</option>
					<?php

						$i = 1000;

						while($i <= 5000){
							echo '<option value="'.$i.'">$'.number_format($i).'</option>';
							$i += 250;
						}
					?>
				</select>
			</p>

			<p>Select Maximum Rent:<br> 
				<select name="maxRent" id="maxRent">
					<option value="9999">Any</option>
					<?php

						$i = 2000;

						while($i <= 7500){
							echo '<option value="'.$i.'">$'.number_format($i).'</option>';
							$i += 500;
						}
					?>
	<!--
					<option value="3000">$3,000</option> // hard coded options used before previous which loop
					<option value="4000">$4,000</option>
					<option value="5000">$5,000</option>
					<option value="6000">$6,000</option>
					<option value="7000">$7,000</option>
	-->
				</select>
			</p>

			<p>Select Number of Bedrooms:<br> 
				<select name="bdrms" id="bdrms">
					<option value="-1">Any</option>
					<option value="0">Studio</option>
					<option value="1">1 Bedroom</option>
					<option value="1.1">1+ Bedroom</option>
					<option value="2">2 Bedrooms</option>
					<option value="2.1">2+ Bedroom</option>
					<option value="3">3 Bedrooms</option>
				</select>
			</p>

			<p>Select Number of Bathrooms:<br> 
				<select name="baths" id="baths">
					<option value="-1">Any</option>
					<option value="1">1 Bath </option>
					<option value="1.5">1.5 Baths </option>
					<option value="1.6">1.5+ Baths </option>
					<option value="2">2 Baths </option>
					<option value="2.1">2+ Baths </option>
					<option value="2.5">2.5 Baths </option>
				</select>
			</p>

			<h3 align="center">Building Amenities:</h3><hr>

			<input type="checkbox" name="doorman" id="doorman" value="doorman" class="cbW">
			<label for="doorman">Doorman </label>

			<input type="checkbox" name="pets" id="pets" value="pets" class="cbW">
			<label for="pets">Pet-friendly </label>
			
			<br><br>

			<input type="checkbox" name="parking" id="parking" value="parking" class="cbW">
			<label for="parking">Parking </label>

			<input type="checkbox" name="gym" id="gym" value="gym" class="cbW">
			<label for="gym">Gym </label><hr>
			
			<!-- Let user decide search order -->
			<p>
				Sort By:
				<select name="orderBy" id="orderBy" style="width:100px;">
					<option value="bdrms">Bedrooms</option>
					<option value="bldgName">Building</option>
					<option value="rent" selected>Rent</option>
					<option value="sqft">Square Feet</option>
				</select>
				
				&nbsp;&nbsp;Results Per Page: 
				<select name="rowsPerPg" id="rowsPerPg" style="width:50px;">
					<option value="5">5</option>
					<option value="10" selected>10</option>
					<option value="25">25</option>
					<option value="50">50</option>
				</select>
			</p>
			<p>
				<input type="radio" name="ascDesc" class="cbW" id="asc" value="ASC" checked>
				<label for="asc">Ascending</label>
				<input type="radio" name="ascDesc" class="cbW" id="desc" value="DESC">
				<label for="desc">Descending</label>
			</p>

			<p><button id="submit" style="width:100%; padding:5px; font-size:1rem; font-weight:800; letter-spacing:10px;">Submit</button></p>
		</form> <!-- cloe form -->
	</div> <!-- close container -->
	
	<script src="js/searchApts.js"></script>
	
</body>
</html>