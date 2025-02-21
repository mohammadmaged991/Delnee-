<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "delnee";

$conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch and sanitize form data
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $check_in = htmlspecialchars($_POST['check_in'] ?? '');
    $check_out = htmlspecialchars($_POST['check_out'] ?? '');
    $car_name = htmlspecialchars($_POST['car_name'] ?? '');
    $rental_start = htmlspecialchars($_POST['rental_start'] ?? '');
    $rental_end = htmlspecialchars($_POST['rental_end'] ?? '');
    $arrival_time = htmlspecialchars($_POST['arrival_time'] ?? '');
    $room_id = isset($_POST['room_id']) ? (int)$_POST['room_id'] : null;  // Ensure room_id is an integer

    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($check_in) || empty($check_out)) {
        die("All required fields must be filled out!");
    }

    // Optional: Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format!");
    }

    // Check if room_id is valid
    if (is_null($room_id) || $room_id <= 0) {
        die("Invalid room ID!");
    }

    // Prepare the SQL query for inserting data
    $sql = "INSERT INTO my_books (user_name, user_email, user_phone, check_in, check_out, car_name, rental_start, rental_end, airport_arrival_time, room_id, user_id) 
            VALUES (:name, :email, :phone, :check_in, :check_out, :car_name, :rental_start, :rental_end, :arrival_time, :room_id, :user_id)";
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters using bindValue() for PDO
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue(':check_in', $check_in, PDO::PARAM_STR);
        $stmt->bindValue(':check_out', $check_out, PDO::PARAM_STR);
        $stmt->bindValue(':car_name', $car_name, PDO::PARAM_STR);
        $stmt->bindValue(':rental_start', $rental_start, PDO::PARAM_STR);
        $stmt->bindValue(':rental_end', $rental_end, PDO::PARAM_STR);
        $stmt->bindValue(':arrival_time', $arrival_time, PDO::PARAM_STR);
        $stmt->bindValue(':room_id', $room_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Booking saved successfully!";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } else {
        echo "Error preparing the SQL statement: " . $conn->errorInfo()[2];
    }

    // Close the database connection
    $conn = null;
} else {
    echo "Invalid request method!";
}
?>
