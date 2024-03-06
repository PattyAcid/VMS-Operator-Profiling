<?php 
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $dob = $_POST['date_of_birth'];
    $gender = $_POST['gender'];

    if (!empty($username) && !empty($email) && !empty($password) && !empty($firstName) && !empty($lastName) && !empty($dob) && !empty($gender)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Save to database
        $query = "INSERT INTO users (username, email, password_hash, first_name, last_name, date_of_birth, gender) VALUES ('$username', '$email', '$hashed_password', '$firstName', '$lastName', '$dob', '$gender')";
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
            <input id="text" type="text" name="first_name" placeholder="First Name" required><br><br>
            <input id="text" type="text" name="last_name" placeholder="Last Name" required><br><br>
            <input id="text" type="date" name="date_of_birth" placeholder="Date of Birth" required><br><br>
            <select id="text" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select><br><br>

            <input id="button" type="submit" value="Signup"><br><br>

            <a href="login.php">Click to Login</a><br><br>
        </form>
    </div>
</body>
</html>
