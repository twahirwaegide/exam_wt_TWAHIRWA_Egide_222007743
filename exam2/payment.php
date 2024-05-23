<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
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
        <h2>Payment Form</h2>
        <form id="paymentForm" method="post">
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" required>

            <label for="workshop_id">Workshop ID:</label>
            <input type="text" id="workshop_id" name="workshop_id" required>

            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" required>

            <label for="payment_date">Payment Date:</label>
            <input type="date" id="payment_date" name="payment_date" required>

            <label for="payment_status">Payment Status:</label>
            <select id="payment_status" name="payment_status" required>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="Failed">Failed</option>
            </select>

            <button type="submit">Submit Payment</button>
        </form>
        <div id="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Database credentials
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "virtual_personal_finance_management_workshops_platform";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare SQL statement to insert data
                $stmt = $conn->prepare("INSERT INTO payments (`user id`, `workshop id`, amount, `payment date`, `payment status`) VALUES (?, ?, ?, ?, ?)");

                // Bind parameters
                $stmt->bind_param("iisss", $user_id, $workshop_id, $amount, $payment_date, $payment_status);

                // Get data from POST request
                $user_id = $_POST['user_id'];
                $workshop_id = $_POST['workshop_id'];
                $amount = $_POST['amount'];
                $payment_date = $_POST['payment_date'];
                $payment_status = $_POST['payment_status'];

                // Execute the statement
                if ($stmt->execute()) {
                    // Success message
                    echo "Payment successfully submitted!";
                } else {
                    // Error message
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
