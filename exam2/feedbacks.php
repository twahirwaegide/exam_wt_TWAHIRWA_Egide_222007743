<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
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

        input, textarea {
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
        <h2>Feedback Form</h2>
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
            $workshopId = $_POST['workshopId'];
            $userId = $_POST['userId'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $feedback = $_POST['feedback'];
            $submittedDate = date('Y-m-d');

            // Insert data into the database
            $query = "INSERT INTO feedbacks (`workshop id`, `user id`, `name`, `email`, `feedback`, `submitted date`) VALUES ('$workshopId', '$userId', '$name', '$email', '$feedback', '$submittedDate')";
            if ($conn->query($query) === TRUE) {
                echo "<div id='result'>New feedback record created successfully</div>";
            } else {
                echo "<div id='result'>Error: " . $query . "<br>" . $conn->error . "</div>";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
        <form id="feedbackForm" method="post" action="">
            <label for="workshopId">Workshop ID:</label>
            <input type="text" id="workshopId" name="workshopId" required>

            <label for="userId">User ID:</label>
            <input type="text" id="userId" name="userId" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" required></textarea>

            <label for="submitted date">submitted date:</label>
            <textarea id="date" name="submitted date" rows="4" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</body>
</html>
