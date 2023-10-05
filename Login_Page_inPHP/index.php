<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <!-- this is  login page useing html -->
    <div style="display:flex; align-items:center; justify-content:center;height:100vh">
        <div>
            <h1>Login.</h1>
            <form method="post">
                <label for="">Enter Username:</label>
                <input type="text" name="getusername"><br><br>
                <label for="">Enter Password :</label>
                <input type="Password" name="getpassword"><br><br>
                <button type="submit" name="sub">Log in</button><br>
            </form>
            <!-- this is php code  -->
            <?php
            if (isset($_POST['sub'])) {
                require '_dbcon.php';   //<----- this is require file to connecyion with database

                $getusername = $_POST['getusername'];
                $getpassword = $_POST['getpassword'];
                $sql1 = "SELECT * from user_data where username='$getusername'and pssword='$getpassword';";
                $sqlres = mysqli_query($conn, $sql1);
                $countrows = mysqli_num_rows($sqlres);
                echo $countrows;
                if ($countrows == 0) {
                    echo " account is not avilable. Please <a href='sign.php'>Sign Up.</a>";
                } else {
                    session_start();
                    $_SESSION['loggedin'] = true;

                    $_SESSION['sendusername'] = $getusername;
                    header("location:dashbord.php"); //<-----user forword to dashbord page
                }
            }
            ?>
        </div>
    </div>
</body>

</html>