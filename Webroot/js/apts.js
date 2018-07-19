// Function to make sure user passwords match
function validatePasswords(){
	const pswd = document.getElementById('pswd').value;
	const pswd2 = document.getElementById('pswd2').value;
	if (pswd != pswd2){
		alert("Passwords Don't Match!");
		return false; // stops the process, stay on this stage
	} // end if
} // end function