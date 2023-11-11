<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, 'demo');
        
        if($mysqli->connect_errno ) {
           printf("Connect failed: %s<br />", $mysqli->connect_error);
           exit();
        }
        printf('Connected successfully.<br />');


        $retval = mysqli_select_db( $mysqli, 'demo' );

        if(! $retval ) {
           die('Could not select database: ' . mysqli_error($mysqli));
        }
        echo "Database demo selected successfully\n";
        $mysqli->close();
    ?>
</body>
</html>