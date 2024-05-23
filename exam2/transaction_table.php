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

// Query to retrieve data from the inventory table
$query = "SELECT * FROM transaction";

// Execute the query
$result = $conn->query($query);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<section id='display-inventory'>";
    echo "<h2><center>transaction table</center></h2>";
    echo "<table border='1' style='width: 100%; border-collapse: collapse;'>";
    echo "<thead style='background-color: #f2f2f2;'>";
    echo "<tr>";
    echo "<th style='padding: 8px;'>transaction id</th>";
    echo "<th style='padding: 8px;'>user id</th>";
    echo "<th style='padding: 8px;'>amount</th>";
    echo "<th style='padding: 8px;'>transaction type</th>";
    echo "<th style='padding: 8px;'>transaction date</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Fetch and display each record
    while ($row = $result->fetch_assoc()) {
        // Displaying each record
        echo "<tr>";
        echo "<td style='padding: 8px;'>" . $row['transaction id'] . "</td>";
        echo "<td style='padding: 8px;'>" . $row['user id'] . "</td>";
        echo "<td style='padding: 8px;'>" . $row['amount'] . "</td>";
        echo "<td style='padding: 8px;'>" . $row['transaction type'] . "</td>";
        echo "<td style='padding: 8px;'>" . $row['transaction date'] . "</td>";
        // Action buttons
        echo "<td style='padding: 8px; text-align: center;'>";
        echo "<button style='background-color: #28a745; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; margin-right: 5px;'>Update</button>";
        echo "<button style='background-color: #dc3545; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer;'>Delete</button>";
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
