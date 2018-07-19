<!DOCTYPE html>
<body>
    <h1>Apartment Rent Estimator</h1><hr>
	<!-- We use 'get' here because we are only getting information. 

	We used 'post' previously -->
    
    <form method="get" action="aptRentEstProc.php">

		<p><label>Select Number of Bedrooms:<br> 
			<select name="bdrms" id="bdrms">
				<option value="1000">Studio ($1,000)</option>
				<option value="1400">1 Bedroom ($1,400)</option>
				<option value="1800">2 Bedrooms ($1,800)</option>
			</select>
		</label></p>
		
		<p><label>Select Number of Bathrooms:<br> 
			<select name="baths" id="baths">
				<option value="100">1 Bath ($100)</option>
				<option value="140">1.5 Baths ($140)</option>
				<option value="180">2 Baths ($180)</option>
				<option value="220">2.5 Baths ($220)</option>
			</select>
		</label></p>
		
		<h2>Additional monthly charges apply for these amenities:</h2><hr>
		
		<p><lable><input type="checkbox" name="doorman" value="0.2" checked>Doorman +20%</lable></p>
		
		<p><label><input type="checkbox" name="riverview" value="150">View of the River +$150</label></p>
		
		<p><label><input type="checkbox" name="parking" value="250">Parking +$250</label></p>
		
		<p><label><input type="checkbox" name="gym" value="80">Gym +$80</label></p><hr>
        
        <p><button>Submit</button></p>
    </form>

</body>