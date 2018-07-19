
<?php
// 1.) there is no form to process

// 2+3.) Connect to mysql, and select database
require_once("conn/connApts.php");
// 4.) write out your CRUD "order" (query) -- what you want to do
$query = "SELECT * FROM apartments, buildings, neighborhoods Where apartments.bldgID = buildings.IDbldg AND buildings.hoodID = neighborhoods.IDhood ORDER BY IDapt ASC";

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
	
</head>
<body>
     
    <table width="1000" border="1" cellpadding="5" align="center">
		<tr>
			<td align="center" colspan="14">
				<h1>Lofty Heights Apartments</h1>
			</td>
		</tr>
		<tr>
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
		</tr>
		<?php
			while($row = mysqli_fetch_array($result)) { ?>
				<tr>
					<td><?php echo $row['IDapt']; ?></td>
					<td><?php echo $row['apt']; ?></td>
					<td><?php echo $row['bldgName']; ?></td>
					<td><?php echo $row['hoodName']; ?></td>
					<td><?php echo $row['bdrms']; ?></td>
					<td><?php echo $row['baths']; ?></td>
					<td>$<?php echo $row['rent']; ?></td>
					<td><?php echo $row['floor']; ?></td>
					<td><?php echo $row['sqft']; ?></td>
					<td><?php 
							if($row['isAvail'] == 1){
								echo "Vacant";
							} else {
								echo "Occupied";
							}
						?></td>
					<td><?php 
							if($row['isDoorman'] == 1){
								echo "Yes";
							} else {
								echo "No";
							}
						?></td>
					<td><?php 
							if($row['isPets'] == 1){
								echo "Yes";
							} else {
								echo "No";
							}
						?></td>
					<td><?php 
							if($row['isParking'] == 1){
								echo "Yes";
							} else {
								echo "No";
							}
						?></td>
					<td><?php 
							if($row['isGym'] == 1){
								echo "Yes";
							} else {
								echo "No";
							}
						?></td>
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