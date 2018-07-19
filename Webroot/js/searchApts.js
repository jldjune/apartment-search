// Function to make sure user passwords match
function validateMinMaxRent(){
	const minRent = document.getElementById('minRent').value;
	const maxRent = document.getElementById('maxRent').value;
	if (minRent >= maxRent){
		alert("Minimum Rent must be less than Maximum Rent!");
		return false; // stops the process, stay on this stage
	} // end if
} // end function