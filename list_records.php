<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

// Fetch records from the database
$query = "SELECT * FROM list_records";
$result = mysqli_query($con, $query);

// Handle delete operation
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM list_records WHERE id = $delete_id";
    mysqli_query($con, $delete_query);
    header("Location: list_records.php"); // Redirect to refresh the page
}

include("header.php"); // Include the common header

?>
    <a href="index.php">Home</a> <!-- Add this line for the home button -->

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Place of Birth</th>
            <th>Civil Status</th>
            <th>Religion</th>
            <th>Tribe</th>
            <th>Current Address</th>
            <th>Degree</th>
            <th>Date of Hired</th>
            <th>Actions</th>
        </tr>
        
        <?php
        // Display records in a table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['date_of_birth'] . "</td>";
            echo "<td>" . $row['place_of_birth'] . "</td>";
            echo "<td>" . $row['civil_status'] . "</td>";
            echo "<td>" . $row['religion'] . "</td>";
            echo "<td>" . $row['tribe'] . "</td>";
            echo "<td>" . $row['current_address'] . "</td>";
            echo "<td>" . $row['degree'] . "</td>";
            echo "<td>" . $row['date_of_hired'] . "</td>";
            echo "<td>";
            echo "<a href='edit_record.php?id=" . $row['id'] . "'>Edit</a> | ";
            echo "<a href='list_records.php?delete_id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>

    </table>

    <br>

    <a href="add_record.php">Add New Record</a>

</body>
</html>
