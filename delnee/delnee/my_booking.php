<?php 
session_start();
?>
<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "delnee";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Database connection failed: " . $e->getMessage());
}
?>
<?php
// Assuming a MySQL connection is already established

// Get the logged-in user's ID (replace this with actual login logic)
$user_id = $_SESSION['user_id'];  // Example, session should store the user's ID

// Query to fetch bookings for the logged-in user
$query = "SELECT * FROM my_books WHERE user_id = ?"; 
$stmt = $pdo->prepare($query); // Assuming you're using PDO for DB interaction
$stmt->execute([$user_id]);

// Fetch all bookings
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Delnee</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

      <!-- Header -->
      <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
          <div class="col-lg-4 bg-dark d-none d-lg-block">
            <a
              href="index.php"
              class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center"
            >
              <h1 class="m-0 text-primary text-uppercase">delnee</h1>
            </a>
          </div>

          <div class="col-lg-8">
            <div class="row gx-0 bg-white d-flex">
              <nav
                class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0"
              >
                <a href="index.php" class="navbar-brand d-block d-lg-none">
                  <h1 class="m-0 text-primary text-uppercase">Delnee</h1>
                </a>
                <button
                  type="button"
                  class="navbar-toggler"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarCollapse"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div
                  class="collapse navbar-collapse justify-content-between"
                  id="navbarCollapse"
                >
                  <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    
                    <a href="countries.php" class="nav-item nav-link">Countries</a>
                    
                    <a href="hotels.php" class="nav-item nav-link">Hotels</a>
                    
                    <a href="my_booking.php" class="nav-item nav-link <?php echo (!isset($_SESSION['username'])) ? 'd-none' : ''; ?>">My Booking</a>

                    
                  </div>

                  <div class="login">  
                    <?php if (isset($_SESSION['username'])) { ?> 
                      <h6 class="text-white m-3"> 
                        <i class="fa fa-user-alt me-3"></i>
                        
                        <?php echo htmlspecialchars($_SESSION['username']); ?>
                      </h6> 
                      
                      <a class="open-button" href="logout.php">Logout</a>
                    <?php }else { ?>
                      <a class="open-button" onclick="openLoginForm()">Login</a>
                    <?php } ?>
                    
                    <div class="form-popup" id="myForm">
                      <form action="login.php" method="POST" class="form-container">
                        <label for="userName"><b>UserName</b></label>
                        <input type="text" placeholder="Enter username" name="username" required>
    
                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>
    
                        <button type="submit" class="btn">Login</button>
                        
                        <button type="button" class="btn cancel" onclick="closeLoginForm()">Close</button>
                        
                        <div class="text-center pt-3">
                          <button href="#" class="">Sign In</button>
                        </div>
                      </form>
                    </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <!-- Booking Information -->
      <div class="container-xxl py-5 content-form">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-4"><span class="text-primary text-uppercase">My Bookings</span> For track Book</h1>
            </div>
            
            <div class="col-md-12">
              <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="container">
    <?php foreach ($bookings as $booking): ?>
    <div class="row g-3">
        <div class="col-10">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="subject" value="<?php echo htmlspecialchars($booking['subject']); ?>" disabled>
                <label for="subject"><?php echo htmlspecialchars($booking['subject']); ?></label>
            </div>
        </div>
        
        <div class="col-md-2 d-flex gap-3">
            <!-- Update Button -->
            <a class="update-btn" href="update_booking.php?id=<?php echo $booking['id']; ?>">
                <i class="fas fa-pencil-alt pt-3 text-warning"></i>
            </a>

            <!-- Delete Button -->
            <a class="delete-btn" href="delete_booking.php?id=<?php echo $booking['id']; ?>" onclick="return confirm('Are you sure you want to delete this booking?');">
                <i class="fas fa-trash-alt pt-3 text-warning"></i>
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>