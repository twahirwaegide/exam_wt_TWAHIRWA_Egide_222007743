<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendee Form</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
    <div class="container">
        <h2>Attendee Form</h2>
        <form id="attendeeForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="attendeeId">Attendee ID:</label>
            <input type="text" id="attendeeId" name="attendeeId" required>

            <label for="userId">User ID:</label>
            <input type="text" id="userId" name="userId" required>

            <label for="workshopId">Workshop ID:</label>
            <input type="text" id="workshopId" name="workshopId" required>

            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" required></textarea>

            <label for="attendeeStatus">Attendee Status:</label>
            <select id="attendeeStatus" name="attendeeStatus" required>
                <option value="">Select Status</option>
                <option value="Attended">Attended</option>
                <option value="Not Attended">Not Attended</option>
            </select>

            <button type="submit">Submit</button>
        </form>
        <div id="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $servername = "localhost";
                $username = "root"; // Replace with your MySQL username
                $password = ""; // Replace with your MySQL password
                $dbname = "virtual_personal_finance_management_workshops_platform";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare and bind SQL statement
                $stmt = $conn->prepare("INSERT INTO attendees (`attendee id`, `user id`, `workshop id`, `feedback`, `attendee status`) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("iiiss", $_POST['attendeeId'], $_POST['userId'], $_POST['workshopId'], $_POST['feedback'], $_POST['attendeeStatus']);

                // Execute statement
                if ($stmt->execute()) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $stmt->error;
                }

                // Close statement and connection
                $stmt->close();
                $conn->close();
            }
            ?>
        </div>
    </div>
</body>
</html>
