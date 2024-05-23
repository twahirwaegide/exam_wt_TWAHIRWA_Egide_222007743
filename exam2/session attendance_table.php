<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";  // Use your MySQL password (leave empty if not set)
$dbname = "virtual_personal_finance_management_workshops_platform"; 

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve data from the sessionattendance table
$query = "SELECT * FROM sessionattendance";

// Execute the query
$result = $conn->query($query);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<section id='display-inventory'>";
    echo "<h2><center>Session Attendance Table</center></h2>";
    echo "<table border='1' style='width: 100%; border-collapse: collapse;'>";
    echo "<thead style='background-color: #f2f2f2;'>";
    echo "<tr>";
    echo "<th style='padding: 8px;'>SessionAttendance ID</th>";
    echo "<th style='padding: 8px;'>Session ID</th>";
    echo "<th style='padding: 8px;'>User ID</th>";
    echo "<th style='padding: 8px;'>Status</th>";
    echo "<th style='padding: 8px;'>Actions</th>"; // Added header for actions
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Fetch and display each record
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='padding: 8px;'>" . $row['sessionattendance id'] . "</td>";
        echo "<td style='padding: 8px;'>" . $row['session id'] . "</td>";
        echo "<td style='padding: 8px;'>" . $row['user id'] . "</td>";
        echo "<td style='padding: 8px;'>" . $row['status'] . "</td>";
        echo "<td style='padding: 8px; text-align: center;'>";
        
        // Update button
        echo "<form method='post' action='update.php' style='display: inline;'>";
        echo "<input type='hidden' name='id' value='" . $row['session attendance id'] . "'>";
        echo "<button type='submit' style='background-color: #28a745; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; margin-right: 5px;'>Update</button>";
        echo "</form>";
        
        // Delete button
        echo "<form method='post' action='delete.php' style='display: inline;'>";
        echo "<input type='hidden' name='id' value='" . $row['session attendance id'] . "'>";
        echo "<button type='submit' style='background-color: #dc3545; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer;'>Delete</button>";
        echo "</form>";
        
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</section>";
} else {
    echo "No inventory records found.";
}

// Close the database connection
$conn->close();
?>
