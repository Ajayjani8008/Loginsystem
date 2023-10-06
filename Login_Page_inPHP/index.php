<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <div style="display:flex; align-items:center; justify-content:center; height:100vh">
        <div>
            <h1>Login.</h1>
            <form method="post">
                <label for="">Enter Username:</label>
                <input type="text" name="getusername"><br><br>
                <label for="">Enter Password :</label>
                <input type="Password" name="getpassword"><br><br>
                <button type="submit" name="sub">Log in</button><br>
            </form>
            <?php
            require '_dbcon.php';

            if (isset($_POST['sub'])) {
                $getusername = $_POST['getusername'];
                $getpassword = $_POST['getpassword'];
                $sql1 = "SELECT * FROM user_data WHERE username='$getusername' AND userpass='$getpassword'";
                $sqlres = mysqli_query($conn, $sql1);
                $countrows = mysqli_num_rows($sqlres);
                
                if ($countrows == 0) {
                    echo "Account is not available. Please <a href='signup.php'>Sign Up.</a>";
                } else {
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['sendusername'] = $getusername;
                    header("location:dashbord.php");
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
