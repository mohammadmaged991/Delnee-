<?php
session_start();

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "delnee";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Check if the username already exists
        $query = $pdo->prepare("SELECT * FROM login WHERE user_name = :username");
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            // Username already exists
            $error = "Username already taken. Please choose another one.";
        } else {
            // Hash the password before saving
            $hashedPassword = password($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $insertQuery = $pdo->prepare("INSERT INTO login (user_name, password) VALUES (:username, :password)");
            $insertQuery->bindParam(':username', $username, PDO::PARAM_STR);
            $insertQuery->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

            if ($insertQuery->execute()) {
                // Success: redirect to login page
                header("Location: index.php");
                exit();
            } else {
                $error = "There was an error while registering. Please try again.";
            }
        }
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
