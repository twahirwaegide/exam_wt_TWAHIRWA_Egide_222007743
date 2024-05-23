<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        #result {
            margin-top: 20px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sessions Form</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Database connection
            $servername = "localhost";
            $username = "root"; // Replace with your actual username
            $password = ""; // Replace with your actual password
            $dbname = "virtual_personal_finance_management_workshops_platform";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get user input from the form
            $workshopId = $_POST['workshopId'];
            $sessionTitle = $_POST['sessionTitle'];
            $sessionDescription = $_POST['sessionDescription'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $sessionStatus = $_POST['sessionStatus'];

            // Prepare and execute SQL statement to insert session data into the database
            $stmt = $conn->prepare("INSERT INTO `sessions` (`workshop id`, `session title`, `session description`, `start date`, `end date`, `session status`) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssss", $workshopId, $sessionTitle, $sessionDescription, $startDate, $endDate, $sessionStatus);

            if ($stmt->execute()) {
                $message = "Session successfully submitted!";
            } else {
                $message = "Error: " . $stmt->error;
            }

            // Close the database connection
            $stmt->close();
            $conn->close();

            echo "<div id='result'>$message</div>";
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="workshopId">Workshop ID:</label>
            <input type="text" id="workshopId" name="workshopId" required>

            <label for="sessionTitle">Session Title:</label>
            <input type="text" id="sessionTitle" name="sessionTitle" required>

            <label for="sessionDescription">Session Description:</label>
            <textarea id="sessionDescription" name="sessionDescription" rows="4" required></textarea>

            <label for="startDate">Start Date:</label>
            <input type="date" id="startDate" name="startDate" required>

            <label for="endDate">End Date:</label>
            <input type="date" id="endDate" name="endDate" required>

            <label for="sessionStatus">Session Status:</label>
            <select id="sessionStatus" name="sessionStatus" required>
                <option value="Scheduled">Scheduled</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>

            <button type="submit">Submit Session</button>
        </form>
    </div>
</body>
</html>
