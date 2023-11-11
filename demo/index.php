<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // $dbhost = 'localhost';
        // $dbuser = 'root';
        // $dbpass = '';
        // $mysqli = new mysqli($dbhost, $dbuser, $dbpass, 'demo');
        
        // if($mysqli->connect_errno ) {
        //    printf("Connect failed: %s<br />", $mysqli->connect_error);
        //    exit();
        // }
        // printf('Connected successfully.<br />');


        // $retval = mysqli_select_db( $mysqli, 'demo' );

        // if(! $retval ) {
        //    die('Could not select database: ' . mysqli_error($mysqli));
        // }
        // echo "Database demo selected successfully\n";
        // $mysqli->close();


        // $dbhost = 'localhost';
        // $dbuser = 'root';
        // $dbpass = '';
        // $dbname = 'demo';
        // $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        // if($mysqli->connect_errno ) {
        //    printf("Connect failed: %s<br />", $mysqli->connect_error);
        //    exit();
        // }
        // printf('Connected successfully.<br />');
        // $sql = "CREATE TABLE students( ".
        //    "id INT NOT NULL AUTO_INCREMENT, ".
        //    "name VARCHAR(100) NOT NULL, ".
        //    "age VARCHAR(40) NOT NULL, ".
        //    "birthdate DATE, ".
        //    "PRIMARY KEY (id)); ";
        // if ($mysqli->query($sql)) {
        //    printf("Table students created successfully.<br />");
        // }
        // if ($mysqli->errno) {
        //    printf("Could not create table: %s<br />", $mysqli->error);
        // }
        // $mysqli->close();


        if(isset($_POST['add'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }
            if(! get_magic_quotes_gpc() ) {
               $tutorial_title = addslashes ($_POST['tutorial_title']);
               $tutorial_author = addslashes ($_POST['tutorial_author']);
            } else {
               $tutorial_title = $_POST['tutorial_title'];
               $tutorial_author = $_POST['tutorial_author'];
            }
            $submission_date = $_POST['submission_date'];
            $sql = "INSERT INTO tutorials_tbl ".
               "(tutorial_title,tutorial_author, submission_date) "."VALUES ".
               "('$tutorial_title','$tutorial_author','$submission_date')";
            mysqli_select_db( $conn, 'TUTORIALS' );
            $retval = mysqli_query( $conn, $sql );
         
            if(! $retval ) {
               die('Could not enter data: ' . mysqli_error($conn));
            }
            echo "Entered data successfully\n";
            mysqli_close($conn);
         } else {
            ?>
            <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">Tutorial Title</td>
               <td><input name = "tutorial_title" type = "text" id = "tutorial_title"></td>
            </tr>         
            <tr>
               <td width = "250">Tutorial Author</td>
               <td><input name = "tutorial_author" type = "text" id = "tutorial_author"></td>
            </tr>         
            <tr>
               <td width = "250">Submission Date [   yyyy-mm-dd ]</td>
               <td><input name = "submission_date" type = "text" id = "submission_date"></td>
            </tr>      
            <tr>
               <td width = "250"> </td>
               <td></td>
            </tr>         
            <tr>
               <td width = "250"> </td>
               <td><input name = "add" type = "submit" id = "add"  value = "Add Tutorial"></td>
            </tr>
         </table>
      </form>
   <?php
      }

      $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'demo';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

      if(! $conn ) {
        die('Could not connect: ' . mysqli_error($conn));
     }
     echo 'Connected successfully<br />';
     
     mysqli_select_db( $conn, 'demo' );
     $sql = "SELECT id, name, age, birthdate FROM students";
     $retval = mysqli_query( $conn, $sql );
     if(! $retval ) {
        die('Could not get data: ' . mysqli_error($conn));
     }
     
     while($row = mysqli_fetch_array($retval, $sql)) {
        echo "ID :{$row['id']}  ".
           "Name: {$row['name']} ".
           "Age: {$row['age']} ".
           "Birth Date : {$row['birthdate']} ".
           "--------------------------------";
     } 
     echo "Fetched data successfully\n";
     mysqli_close($conn);
   ?>
</body>
</html>