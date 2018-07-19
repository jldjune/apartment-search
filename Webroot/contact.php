<!DOCTYPE html>
<body>
    <h1>Contact Form</h1>
    
    <form method="post" action="contactProc.php">
    
        <p><label>First Name: <input type="text" name="firstName" id="firstName" required></label></p>
        
        <p><label>Last Name: <input type="text" name="lastName" id="lastName"></label></p>
        
        <p><label>Email: <input type="email" name="email" id="email" required></label></p>
        
        <p><label>Message: <br><textarea cols="80" rows="5" name="message" required></textarea></label></p>
    
        <p><button>Submit</button></p>
    </form>

</body>