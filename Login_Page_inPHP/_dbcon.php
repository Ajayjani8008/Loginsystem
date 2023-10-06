<?php
// creating connection with the database
$conn = mysqli_connect('localhost', 'root', '', 'users') or die(mysqli_error($conn));
if (!$conn) {
    echo "There is a problem connecting to the database.";
} else {
    echo "Connection created successfully";
}
?>
