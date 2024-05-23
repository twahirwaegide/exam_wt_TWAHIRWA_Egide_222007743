<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop Materials Form</title>
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
        <h2>Workshop Materials Form</h2>
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

            // Get material details from the form
            $workshopId = $_POST['workshopId'];
            $title = $_POST['title'];
            $filePath = $_POST['filePath'];
            $description = $_POST['description'];
            $createdDate = $_POST['createdDate'];

            // Prepare and execute SQL statement to insert material data into the database
            $stmt = $conn->prepare("INSERT INTO `workshop_materials` (`workshop id`, `title`, `file path`, `description`, `created date`) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $workshopId, $title, $filePath, $description, $createdDate);

            if ($stmt->execute()) {
                $message = "Material successfully submitted!";
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

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="filePath">File Path:</label>
            <input type="text" id="filePath" name="filePath" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="createdDate">Created Date:</label>
            <input type="date" id="createdDate" name="createdDate" required>

            <button type="submit">Submit Material</button>
        </form>
    </div>
</body>
</html>
