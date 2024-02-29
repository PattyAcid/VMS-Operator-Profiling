<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

// Handle form submission for updating a record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $place_of_birth = $_POST['place_of_birth'];
    $civil_status = $_POST['civil_status'];
    $religion = $_POST['religion'];
    $tribe = $_POST['tribe'];
    $current_address = $_POST['current_address'];
    $degree = $_POST['degree'];
    $date_of_hired = $_POST['date_of_hired'];

    $update_query = "UPDATE list_records SET name='$name', gender='$gender', date_of_birth='$date_of_birth', 
                    place_of_birth='$place_of_birth', civil_status='$civil_status', religion='$religion', 
                    tribe='$tribe', current_address='$current_address', degree='$degree', date_of_hired='$date_of_hired'
                    WHERE id=$id";
    mysqli_query($con, $update_query);
    header("Location: list_records.php"); // Redirect to the list after update
}

// Retrieve the record to be edited
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_query = "SELECT * FROM list_records WHERE id=$id";
    $result = mysqli_query($con, $select_query);
    $record = mysqli_fetch_assoc($result);
} else {
    header("Location: list_records.php"); // Redirect if no record ID provided
}

include("header.php"); // Include the common header

?>
    <a href="index.php">Home</a> <!-- Add this line for the home button -->

    <form method="POST" action="edit_record.php">
        <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $record['name']; ?>" required>
        <br>
        <label>Gender:</label>
        <input type="text" name="gender" value="<?php echo $record['gender']; ?>" required>
        <br>
        <label>Date of Birth:</label>
        <input type="date" name="date_of_birth" value="<?php echo $record['date_of_birth']; ?>" required>
        <br>
        <label>Place of Birth:</label>
        <input type="text" name="place_of_birth" value="<?php echo $record['place_of_birth']; ?>" required>
        <br>
        <label>Civil Status:</label>
        <input type="text" name="civil_status" value="<?php echo $record['civil_status']; ?>" required>
        <br>
        <label>Religion:</label>
        <input type="text" name="religion" value="<?php echo $record['religion']; ?>" required>
        <br>
        <label>Tribe:</label>
        <input type="text" name="tribe" value="<?php echo $record['tribe']; ?>" required>
        <br>
        <label>Current Address:</label>
        <input type="text" name="current_address" value="<?php echo $record['current_address']; ?>" required>
        <br>
        <label>Degree:</label>
        <input type="text" name="degree" value="<?php echo $record['degree']; ?>" required>
        <br>
        <label>Date of Hired:</label>
        <input type="date" name="date_of_hired" value="<?php echo $record['date_of_hired']; ?>" required>
        <br>
        <br>
        <input type="submit" value="Update Record">
    </form>

</body>
</html>
