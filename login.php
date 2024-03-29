<?php 
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password)) {
        // Read from database
        $query = "SELECT * FROM users WHERE username = '$user_name' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            // Check if password matches
            if (password_verify($password, $user_data['password_hash'])) {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                die;
            } else {
                echo "Wrong username or password!";
            }
        } else {
            echo "Wrong username or password!";
        }
    } else {
        echo "Please enter both username and password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <style type="text/css">
    #text{
        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    }
    #button{
        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
        margin: 5px;
    }
    #box{
        background-color: grey;
        margin: auto;
        width: 300px;
        padding: 20px;
    }
    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px;margin: 10px;color: white;">Login</div>

            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>

            <a href="signup.php">Click to Signup</a><br><br>
            
            <!-- Buttons for password recovery -->
            <a href="recovery.php"><button id="button">Forgot Password</button></a>
            <a href="forgot_password.php"><button id="button">Forgot Password (New Page)</button></a>
            <a href="reset_password.php"><button id="button">Reset Password</button></a>
        </form>
    </div>
</body>
</html>
