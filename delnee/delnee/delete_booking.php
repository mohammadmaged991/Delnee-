<?php 
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbName = "delnee";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
?>

<?php
// Assuming the user is logged in
$user_id = $_SESSION['user_id'];  // Get logged-in user ID
$booking_id = $_GET['id'];  // Get the booking ID to be deleted

// Connect to the database

$query = "DELETE FROM my_books WHERE id = ? AND user_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$booking_id, $user_id]);

// Redirect back to the booking list page
header('Location: my_booking.php');
exit;
?>
