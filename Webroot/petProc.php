<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Pet Survey</title>
    <style>
        table{
            width: 90%;
            height: 150px;
        }
        table, th, td{
            
            border: solid black 5px;
        }
        #imageData{
            width: 20%;
        }
        img{
            width: 100%;
            height: auto;
            
        }
    </style>
</head>
<body>
    <?php
    $pet = $_GET['pet'];
    $food = $_GET['food'];
    if($pet == 'Dog'){
        $sound = 'Woof';
    }
    elseif ($pet == 'Cat'){
        $sound = "Meow";
    }
    elseif ($pet == 'Rabbit'){
        $sound = 'Crunch';
    }
    else {
        $sound = 'Unknown';
    }

    ?>
    <!-- Php cretes a global array named "$_GET" with the names and values from the query string,
    that is the name-value pairs in the URL after the "?" character. -->
    <table>
        <tr>
            <th colspan="2"><h1>PHP Pet Person Survey Result</h1></th>
        </tr>
        <tr>
            <td id="imageData">
                <img src="image/silhouette-<?php echo $pet; ?>.jpg">
            </td>
            <td>
             <h2 align="center"><?php echo $sound; ?>! So, you are a <?php echo $pet; ?> Person!<br><br>Does your <?php echo $pet; ?> like eating <?php echo $food; ?>?</h2>
            </td>
        </tr>
    
    </table>
</body>
</html>