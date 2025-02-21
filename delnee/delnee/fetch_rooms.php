<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "delnee";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_GET['hotel_id'])) {
        $hotelId = intval($_GET['hotel_id']); // Sanitize input
        // SQL query to fetch rooms for the specific hotel
        $stmt = $pdo->prepare("SELECT * FROM rooms WHERE hotel_id = :hotel_id");
        $stmt->bindParam(':hotel_id', $hotelId, PDO::PARAM_INT);
        $stmt->execute();

        $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

  
    } else {
        echo "Hotel ID is missing!";
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>