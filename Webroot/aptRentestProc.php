<?php
// displays all errors, no matter what they are
error_reporting(-1);
$bdrms = $_GET['bdrms'];
$baths = $_GET['baths'];
// if doorman is checked sets it to a variable
if(isset($_GET['doorman'])){
	$doorman = $_GET['doorman'];
}
else {// if not checked set to 0
	$doorman = 0;
}
// if river view checked sets it to a variable
if(isset($_GET['riverview'])){
	$riverview = $_GET['riverview'];
}
else {
	$riverview = 0;
}
// if parking checked sets it to a variable
if(isset($_GET['parking'])){
	$parking = $_GET['parking'];
}
else {
	$parking = 0;
}
// if gym checked sets it to a variable
if(isset($_GET['gym'])){
	$gym = $_GET['gym'];
}
else {
	$gym = 0;
}

$rent = $bdrms + $baths + $riverview + $parking + $gym;
$rent += $rent * $doorman;

?><!doctype html>
<body>
    
    <h1>Your estimated rent is $<?php echo number_format($rent); ?></h1>
   
</body>