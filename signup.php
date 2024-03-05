<?php 
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Save to database
        $query = "INSERT INTO users (username, email, password_hash) VALUES ('$username', '$email', '$hashed_password')";
        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        echo "Please enter all required information!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
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
            <div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

            <input id="text" type="text" name="username" placeholder="Username" required><br><br>
            <input id="text" type="email" name="email" placeholder="Email" required><br><br>
            <input id="text" type="password" name="password" placeholder="Password" required><br><br>

            <input id="button" type="submit" value="Signup"><br><br>

            <a href="login.php">Click to Login</a><br><br>
        </form>
    </div>
</body>
</html>
