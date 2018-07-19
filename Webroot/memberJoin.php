<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Member Join</title>
</head>
<body>
    <h1>Join Now!</h1>
    
    <form method="post" action="memberJoinProc.php" id="form1" name="form1" onsubmit="return validatePasswords()">
    
        <p><label>First Name: <input type="text" name="firstName" id="firstName" required></label></p>
        
        <p><label>Last Name: <input type="text" name="lastName" id="lastName" required></label></p>
        
        <p><label>Email: <input type="email" name="email" id="email" required></label></p>
		
		<p><label>Username: <input type="text" name="user" id="user" required></label></p>
		
		<p><label>Password: <input type="password" name="pswd" id="pswd" required></label></p>
		
		<p><label>Re-type Password: <input type="password" name="pswd2" id="pswd2" required></label></p>
        
<!--        <p><label>Message: <br><textarea cols="80" rows="5" name="message" required></textarea></label></p>-->
    
        <p><button>Sign Me Up!</button></p>
    </form>
	<script src="js/apts.js"></script>

</body>
</html>