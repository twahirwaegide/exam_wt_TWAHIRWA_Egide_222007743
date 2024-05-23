<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Form</title>
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
        <h2>Transaction Form</h2>
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
            $userId = $_POST['userId'];
            $amount = $_POST['amount'];
            $transactionType = $_POST['transactionType'];
            $transactionDate = $_POST['transactionDate'];

            // Prepare and execute SQL statement to insert transaction data into the database
            $stmt = $conn->prepare("INSERT INTO `transaction` (`user id`, `amount`, `transaction type`, `transaction date`) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $userId, $amount, $transactionType, $transactionDate);

            if ($stmt->execute()) {
                $message = "Transaction successfully submitted!";
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
            <label for="userId">User ID:</label>
            <input type="text" id="userId" name="userId" required>

            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" required>

            <label for="transactionType">Transaction Type:</label>
            <select id="transactionType" name="transactionType" required>
                <option value="Credit">Credit</option>
                <option value="Debit">Debit</option>
            </select>

            <label for="transactionDate">Transaction Date:</label>
            <input type="date" id="transactionDate" name="transactionDate" required>

            <button type="submit">Submit Transaction</button>
        </form>
    </div>
</body>
</html>
