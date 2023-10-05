 <?php
    // creating data base 
    $database = "CREATE database users";
    if (mysqli_query($conn, $database)) {
        echo "data base created successfully";
    } else {
        echo " there is error in create database ";
        mysqli_error($conn);
    }
    // creating  and table
    $table = "CREATE TABLE user_data (
 srno. INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(30) NOT NULL,
 userpass VARCHAR(30) NOT NULL)";
    if (mysqli_query($conn, $table)) {
        echo "table create succesfully";
    } else {
        echo "there is erroe in table creation";
        mysqli_error($conn);
    }
    ?>