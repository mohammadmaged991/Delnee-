<?php
session_start();

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
    
        try {
            // Query to fetch user details
            $query = $pdo->prepare("SELECT * FROM login WHERE user_name = :username");
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->execute();
    
            if ($query->rowCount() > 0) {
                $user = $query->fetch(PDO::FETCH_ASSOC);
                
                // Verify password (using password_verify)
                if ($password === $user['password']) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['user_name'];
    
                    // Redirect to a dashboard or home page
                    header("Location: index.php");
                    exit();
                } else {
                    $error = "Invalid password.";
                }
            } else {
                $error = "User not found.";
            }
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
