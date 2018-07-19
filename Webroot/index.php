<!DOCTYPE html>
<html lang="en">
<head>
    <title>Php Introduction</title>
</head>
<body>
<?php
    // one line comments
    $firstName = "Brian";
    /* 
        multi line comment
    */
    $lastName = 'McClain';
    $carPrice = 14588;
    // php array
    $fruits = ['Apple', 'Banana', 'Cherry'];
    // php string keyed array
    $fruits = [
        0 => 'Apple',
        'acidic' => 'Apple',
        'sweet' => 'Banana',
        'tart' => 'Cherry',
    ];
?>
<p><?php
    echo "Hello $firstName $lastName in double quotes."; ?></p>
    
<?php echo '<p>Hello '.$firstName.' '.$lastName.' in single quotes</p>'; 
?>
    
<?php echo '<h2>The first fruit is '.$fruits[0].'. But the sweetest one is '.$fruits['sweet'].'.</h2'; ?>
    
<p><a href="movies.php?genre=comedy&title=Animal%20House&year=1978">Watch Now</a></p>
</body>
</html>