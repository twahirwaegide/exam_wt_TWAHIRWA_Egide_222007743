<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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

        #error {
            margin-top: 10px;
            color: red;
        }

        #success {
            margin-top: 10px;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
            $username = "root"; // Replace with your database username
            $password = ""; // Replace with your database password
            $dbname = "virtual_personal_finance_management_workshops_platform";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("<div id='error'>Connection failed: " . $conn->connect_error . "</div>");
            }

            $user_name = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $first_name = $_POST['firstName'];
            $last_name = $_POST['lastName'];
            $role = $_POST['role'];

            // Validate input
            if (!empty($user_name) && !empty($email) && !empty($password) && !empty($first_name) && !empty($last_name) && !empty($role)) {
                // Prepare and bind
                $stmt = $conn->prepare("INSERT INTO users (`user name`, `email`, `password`, `first name`, `last name`, `role`) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $user_name, $email, $password, $first_name, $last_name, $role);

                if ($stmt->execute()) {
                    echo "<div id='success'>Registration successful!</div>";
                } else {
                    echo "<div id='error'>Error: " . $stmt->error . "</div>";
                }

                $stmt->close();
            } else {
                echo "<div id='error'>All fields are required.</div>";
            }

            $conn->close();
        }
        ?>
        <form id="registrationForm" action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>
            
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>
            
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="">Select Role</option>
                <option value="User">User</option>
                <option value="Instructor">Instructor</option>
                <option value="Admin">Admin</option>
            </select>

            <button type="submit">Register</button>
        </form>
        <div id="error"></div>
        <div id="success"></div>
    </div>
</body>
</html>
