<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('image 1.webp'); /* Replace 'image1.webp' with your image file */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Add transparency to the background */
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h2 {
            margin-bottom: 30px;
            color: #333;
        }

        button {
            padding: 15px 30px;
            margin: 10px;
            font-size: 18px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            background-color: #4CAF50; /* Green */
            color: white;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049; /* Darker green */
        }

        button:focus {
            outline: none;
        }

        button:active {
            transform: translateY(2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome to Your Dashboard</h2>
        <form>
            <button type="submit" formaction="home.html">Log Out</button>
            <button type="submit" formaction="transaction.php">Transaction</button>
            <button type="submit" formaction="personal_finance_resources.php">Workshop Materials</button>
            <button type="submit" formaction="workshop attendance.php">Workshop Attendance</button>
            <button type="submit" formaction="attendees.php">attendees</button>
            <button type="submit" formaction="feedbacks.php">Feedback</button>
            <button type="submit" formaction="payment.php">Payment</button>
            <button type="submit" formaction="personal_finance_resources.php">personal_finance_resources</button>
            <button type="submit" formaction="sessions.php">Session</button>
            <button type="submit" formaction="workshop.php">Workshop</button>
            <button type="submit" formaction="instructor.php">Instructor</button>
        </form>
    </div>
</body>
</html>
