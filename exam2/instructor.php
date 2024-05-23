<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Form</title>
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
            max-width: 400px;
            width: 100%;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input, textarea, select {
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
        <h2>Instructor Form</h2>
        <form id="instructorForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="userId">User ID:</label>
            <input type="text" id="userId" name="userId" required>

            <label for="expertise">Expertise:</label>
            <input type="text" id="expertise" name="expertise" required>

            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio" rows="4" required></textarea>

            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <button type="submit">Submit</button>
        </form>
        <div id="result">
            <?php
            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = ""; // Use your MySQL password (leave empty if not set)
            $dbname = "virtual_personal_finance_management_workshops_platform";

            // Create a connection to the database
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data
                $userId = $_POST['userId'];
                $expertise = $_POST['expertise'];
                $bio = $_POST['bio'];
                $rating = $_POST['rating'];

                // Prepare SQL statement
                $sql = "INSERT INTO instructor (`user id`, expertise, bio, rating) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);

                // Bind parameters and execute the statement
                $stmt->bind_param("isss", $userId, $expertise, $bio, $rating);
                if ($stmt->execute()) {
                    echo "New record inserted successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // Close the database connection
                $stmt->close();
                $conn->close();
            }
            ?>
        </div>
    </div>
</body>
</html>
