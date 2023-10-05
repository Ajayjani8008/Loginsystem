<?php
// creating connection with database
$conn=mysqli_connect('localhost','root','','users') or die (mysqli_error($connection));
if(!$conn){
    echo "there is  problem to create database";
}else{
     echo "connection create succesfully";
}
