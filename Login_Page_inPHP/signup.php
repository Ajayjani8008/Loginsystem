<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
</head>
<body>
    <div style="display:flex; align-items:center; justify-content:center; height:100vh">
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

    if (isset($_POST['sub'])) {
        $getname = $_POST['getname'];
        $getusername = $_POST['getusername'];
        $getpassword = $_POST['getpassword'];
        $conpassword = $_POST['conpassword'];

        $sql = "SELECT username FROM user_data WHERE username='" . $getusername . "'";

        $sqlres = mysqli_query($conn, $sql);
        $rowcount = mysqli_num_rows($sqlres);
        
        if ($rowcount != 0) {
            echo "Username is not available. Try another one.";
        } elseif ($getpassword != $conpassword) {
            echo "Passwords do not match.";
        } else {
            echo "You have successfully signed up.<br>";
            $gotologin = "<a href='index.php'>Log in.</a> <br>";
            echo $gotologin . "<br>";
 
            // Data inserting into the database
            $sql = "INSERT INTO user_data(username, userpass) VALUES('" . $getusername . "','" . $getpassword . "')";

            $sqlres = mysqli_query($conn, $sql);
        }
    }
    ?>
</body>
</html>
