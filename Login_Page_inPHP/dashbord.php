<?php
//this dashbord page to say 'welcome' to user and give access him to his account
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header("location:login.php");
}
echo"welcome . ".$_SESSION['sendusername'];
