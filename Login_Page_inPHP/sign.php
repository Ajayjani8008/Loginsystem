<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
</head>

<body>
    <!-- now we creating sign up page useing html -->
    <div style="display:flex; align-items:center; justify-content:center;height:100vh">
        <div>
            <h1>Sign Up.</h1>
            <form method="post">
                <label for="">Enter your name :</label>
                <input type="text" name="getname"><br><br>
                <label for="">Enter Username :</label>
                <input type="text" name="getusername"><br><br>
                <label for="">Enter Password :</label>
                <input type="Password" name="getpassword"><br><br>
                <label for="">Confirm Password :</label>
                <input type="Password" name="conpassword"><br><br>
                <button type="submit" name="sub">Sign Up</button><br>
            </form>
        </div>
    </div>
    <?php

    require '_dbcon.php';
    // this is require file  to conntion with database
    if (isset($_POST['sub'])) {
        $getname = $_POST['getname'];
        $getusername = $_POST['getusername'];
        $getpassword = $_POST['getpassword'];
        $conpassword = $_POST['conpassword'];

        $sql = "SELECT username from user_data where username='" . $getusername . "'";

        $sqlres = mysqli_query($conn, $sql);
        $rowcount = mysqli_num_rows($sqlres);
        if ($rowcount != 0) {
            echo "user name id not avilable .try another one";
        }
        if ($getpassword != $conpassword) {
            echo " password  does not match ";
        }
        if (($rowcount == 0) && ($getpassword == $conpassword)) {
            echo "you have successfully sign up.<br>";
            $gotologin = "<a href='index.php'>Log in.</a> <br>"; //user forword to login page
            echo $gotologin . "<br>";
            //data inserting in database
            $sql = "INSERT INTO user_data(full_name, username, pssword) values('" . $getname . "','" . $getusername . "','" . $getpassword . "')";


            $sqlres = mysqli_query($conn, $sql);
        }
    }
    ?>

</body>

</html>