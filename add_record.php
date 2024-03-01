<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

// Handle form submission for adding a new record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    $contact_number = $_POST['contact_number']; // Added field
    $job_designation = $_POST['job_designation']; // Added field
    $job_description = $_POST['job_description']; // Added field
    $job_area = $_POST['job_area']; // Added field

    $insert_query = "INSERT INTO list_records (name, gender, date_of_birth, place_of_birth, civil_status, religion, 
                      tribe, current_address, degree, date_of_hired, contact_number, job_designation, 
                      job_description, job_area) 
                      VALUES ('$name', '$gender', '$date_of_birth', '$place_of_birth', '$civil_status', '$religion', 
                      '$tribe', '$current_address', '$degree', '$date_of_hired', '$contact_number', '$job_designation', 
                      '$job_description', '$job_area')";
    mysqli_query($con, $insert_query);
    header("Location: list_records.php"); // Redirect to the list after insert
}

include("header.php"); // Include the common header

?>

<a href="index.php">Home</a> <!-- Add this line for the home button -->

<form method="POST" action="add_record.php">
    <!-- Existing fields -->
    <label>Name:</label>
    <input type="text" name="name" required>
    <br>
    <label>Gender:</label>
    <input type="text" name="gender" required>
    <br>
    <label>Date of Birth:</label>
    <input type="date" name="date_of_birth" required>
    <br>
    <label>Place of Birth:</label>
    <input type="text" name="place_of_birth" required>
    <br>
    <label>Civil Status:</label>
    <input type="text" name="civil_status" required>
    <br>
    <label>Religion:</label>
    <input type="text" name="religion" required>
    <br>
    <label>Tribe:</label>
    <input type="text" name="tribe" required>
    <br>
    <label>Current Address:</label>
    <input type="text" name="current_address" required>
    <br>
    <label>Degree:</label>
    <input type="text" name="degree" required>
    <br>
    <label>Date of Hired:</label>
    <input type="date" name="date_of_hired" required>
    <br>

    <!-- New fields -->
    <label>Contact Number:</label>
    <input type="text" name="contact_number" required>
    <br>
    <label>Job Designation:</label>
    <input type="text" name="job_designation" required>
    <br>
    <label>Job Description:</label>
    <input type="text" name="job_description" required>
    <br>
    <label>Job Area:</label>
    <input type="text" name="job_area" required>
    <br>

    <br>
    <input type="submit" value="Add Record">
</form>

</body>
</html>
