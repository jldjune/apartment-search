
<?php
// 1.) there is no form to process
$bdrms = $_GET['bdrms'];
$baths = $_GET['baths'];
$maxRent = $_GET['maxRent'];
$minRent = $_GET['minRent'];
$bldgID = $_GET['bldgID']; // from dynamic building menu
$orderBy = $_GET['orderBy']; // from order by menu
$ascDesc = $_GET['ascDesc'];

// 2+3.) Connect to mysql, and select database
require_once("conn/connApts.php");
// 4.) write out your CRUD "order" (query) -- what you want to do
$query = "SELECT * FROM apartments, buildings, neighborhoods 
	WHERE apartments.bldgID = buildings.IDbldg 
	AND buildings.hoodID = neighborhoods.IDhood 
	AND rent <= '$maxRent' AND rent >= '$minRent'";

// concat query if user typed something
if($_GET['search'] != " "){ // true if user typed something
	$search = $_GET['search'];
	$query.=" AND (aptDesc LIKE '%$search%'
					OR aptTitle LIKE '%$search%'		
					OR bldgDesc LIKE '%$search%'
					OR hoodDesc LIKE '%$search%'
					OR bldgName LIKE '%$search%'
					OR address LIKE '%$search%')"; // LIKE means includes
}

// concat query for bedroom and baths if menu is not "ANY" (value="-1")
if($bdrms != -1){
	if(is_int($bdrms)){ // test if $bdrms variable is an integer
		$query.=" AND bdrms = '$bdrms'";
	} else { // if $bdrms is not an integer
		$bdrms = round($bdrms); // round down to get an integer
		$query.=" AND bdrms >= '$bdrms'";// use new integer value to set range
	}// end if-else
}// end if

if($baths != -1){
	$baths10 = $baths * 10; // baths times 10 to avoid dividing by less than 1
	if($baths10 % 5 == 0){ // test for direct non-plus values
		$query.=" AND baths = '$baths'";
	} else {
		$baths -= ($baths10 % 5)/10; // removes the plus value by getting rid of remainder divided by 10
		$query.=" AND baths >= '$baths'";// use new value to set range
	}// end if-else
}// end if

// concat query if user chooses a bldg from dynamic bldg menu

if($bldgID != -1){ // if user did not choose ANY(-1)
	$query.=" AND bldgID ='$bldgID'";
}
// concat query for checkboxes -- "check" to see if the checkboxes are actually checked
if(isset($_GET['doorman'])){ // is the doorman variable set, if so add query
	$query.=" AND isDoorman=1";
}

if(isset($_GET['pets'])){
	$query.=" AND isPets=1";
}

if(isset($_GET['parking'])){
	$query.=" AND isParking=1";
}

if(isset($_GET['gym'])){
	$query.=" AND isGym=1";
}

$query.=" ORDER BY $orderBy $ascDesc"; // this line must be last

// 5.) execute the order: read records from apartments table
$result = mysqli_query($conn, $query);

// 6.) "peel off" the first row of data from $result, an "array of arrays"
//$row = mysqli_fetch_array($result);

// testing
//echo $row['rent']; // should return the rent of first apt
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Apartments Selection</title>
	<link href="css/apts.css" rel="stylesheet">
</head>
<body>
     
    <table width="1000" border="1" cellpadding="5" align="center">
		<tr>
			<td align="center" colspan="14">
				<h1>Lofty Heights Apartments</h1>
				<h2><?php echo mysqli_num_rows($result);?> Results Found</h2>
			</td>
		</tr>
		<?php 
			if(mysqli_num_rows($result) == 0){
				echo '<tr>
						<td colspan="14" align="center">
							<h3>
								Sorry! No Results Found!<br>
								<button type="button" onclick="window.history.back()">Search Again</button><br>
								Redirecting...
							</h3>
						</td>
					</tr>';
				// If user does not click the Search again button redirect to search page
				header("Refresh:10; url=searchApts.php", true, 303);
			} else {
				echo '<tr>
						<th>ID</th>
						<th>Apt</th>
						<th>Building</th>
						<th>Neighborhood</th>
						<th>Bdrms</th>
						<th>Baths</th>
						<th>Rent</th>
						<th>Floor</th>
						<th>Sqft</th>
						<th>Status</th>
						<th>Doorman</th>
						<th>Pets</th>
						<th>Parking</th>
						<th>Gym</th>
					</tr>';
			}
		?>
		<?php
			while($row = mysqli_fetch_array($result)) { ?>
				<tr>
					<td><?php echo $row['IDapt']; ?></td>
					<td>
						<a href="aptDetails.php?aptID=<?php echo $row['IDapt']; ?>">
							<?php echo $row['apt']; ?>
						</a>
					</td>
					<td>
						<a href="bldgDetails.php?bldgID=<?php echo $row['bldgID']; ?>">
							<?php echo $row['bldgName']; ?>
						</a>
					</td>
					<td><?php echo $row['hoodName']; ?></td>
					<td>
						<?php 
//							
//							if($row['bdrms'] == 0){
//								echo "Studio";
//							} else {
//								echo $row['bdrms'];
//							}
							echo $row['bdrms'] == 0 ? 'Studio' : $row['bdrms']; // tertiary statement of above if/else statement
						?>
					</td>
					<td><?php echo $row['baths']; ?></td>
					<td>$<?php echo number_format($row['rent']); ?></td>
					<td><?php echo $row['floor']; ?></td>
					<td><?php echo number_format($row['sqft']); ?></td>
					<td>
						<?php 
							if($row['isAvail'] == 1){
								echo "Available";
							} else {
								echo "Occupied";
							}
						?>
					</td>
					<td>
						<?php 
							if($row['isDoorman'] == 1){
								echo "Yes";
							} else {
								echo "No";
							}
						?>
					</td>
					<td>
						<?php 
							if($row['isPets'] == 1){
								echo "Yes";
							} else {
								echo "No";
							}
						?>
					</td>
					<td>
						<?php 
							if($row['isParking'] == 1){
								echo "Yes";
							} else {
								echo "No";
							}
						?>
					</td>
					<td>
						<?php 
							if($row['isGym'] == 1){
								echo "Yes";
							} else {
								echo "No";
							}
						?>
					</td>
				</tr>
		<?php } ?>
	</table>
	<script>
		let vacant = document.querySelectorAll('td').value;
		if(vacant == "No"){
			vacant.style.backgroundColor = "red";
		}
		
	
	
	</script>

</body>
</html>