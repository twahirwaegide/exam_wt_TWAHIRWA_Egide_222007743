<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
        }

        nav ul li a:hover {
            background-color: #555;
            border-radius: 5px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <nav>
        <ul>
            <li><a href="attendees_table.php">Attendees Table</a></li>
            <li><a href="feedback_table.php">Feedback Table</a></li>
            <li><a href="instructor_table.php">Instructor Table</a></li>
            <li><a href="payment_table.php">Payment Table</a></li>
            <li><a href="personal_finance_resources_table.php">Personal Finance Resources Table</a></li>
            <li><a href="session_table.php">Session Table</a></li>
            <li><a href="transaction_table.php">Transaction Table</a></li>
            <li><a href="workshopattendance_table.php">Workshop Attendance Table</a></li>
            <!-- Add more links for other functionalities -->
            <li><a href="home.html">Logout</a></li>
        </ul>
    </nav>

    <!-- Main content -->
    <div class="container">
        <!-- Attendees Table -->
        <a href="attendees_table.php" style="text-decoration: none;">
            <table>
                <!-- Table headers -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <!-- Add more headers as needed -->
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                    <!-- PHP code to fetch and display data -->
                    <!-- Example: -->
                    <!-- <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                    </tr> -->
                </tbody>
            </table>
        </a>

        <!-- Add similar anchor tags for other tables -->
    </div>

    <!-- Include JavaScript code here for any dynamic interactions -->
</body>
</html>
