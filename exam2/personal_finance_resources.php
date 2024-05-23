<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "virtual_personal_finance_management_workshops_platform";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Form submission and database insertion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];

    $sql = "INSERT INTO personal_finance_resources (title, description, link) VALUES ('$title', '$description', '$link')";

    if ($mysqli->query($sql) === TRUE) {
        echo "<p>New record created successfully.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $mysqli->error . "</p>";
    }
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Personal Finance Resource</title>
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
            width: 100%;
            max-width: 600px;
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"], textarea {
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

        p {
            margin-top: 20px;
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Personal Finance Resource</h2>
        <form id="resourceForm" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="link">Link:</label>
            <input type="text" id="link" name="link" required>

            <button type="submit">Add Resource</button>
        </form>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <p>New record created successfully.</p>
        <?php } ?>
    </div>
</body>
</html>
