<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Attendance Form</title>
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

        input, select {
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
        <h2>Session Attendance Form</h2>
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

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sessionId = $_POST['sessionId'];
            $userId = $_POST['userId'];
            $status = $_POST['status'];

            // Insert data into the database
            $query = "INSERT INTO session_attendance (`session id`, `user id`, `status`) VALUES ('$sessionId', '$userId', '$status')";
            if ($conn->query($query) === TRUE) {
                echo "<div id='result'>New attendance record created successfully</div>";
            } else {
                echo "<div id='result'>Error: " . $query . "<br>" . $conn->error . "</div>";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
        <form id="attendanceForm" method="post" action="">
            <label for="sessionId">Session ID:</label>
            <input type="text" id="sessionId" name="sessionId" required>

            <label for="userId">User ID:</label>
            <input type="text" id="userId" name="userId" required>

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
            </select>

            <button type="submit">Submit Attendance</button>
        </form>
    </div>
</body>
</html>
