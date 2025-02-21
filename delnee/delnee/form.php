<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Delnee</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link
      href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
      rel="stylesheet"
    />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body>
    <div class="container-xxl bg-white p-0">
      <!-- Spinner -->
      <div
        id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
      >
        <div
          class="spinner-border text-primary"
          style="width: 3rem; height: 3rem"
          role="status"
        >
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
                          <a type="button" class="btn sign-in bg-success" href="sign_in.php">Sign In</a>
                        </div>
                      </form>
                    </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <!-- Form -->
      <div class="container-xxl py-5">
        <div class="container">
          <div class="row text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="col-md-12 mb-2">
              <span class="text-primary text-uppercase">My Booking</span> Form
            </h1>
          </div>

          <form action="save_booking.php" method="POST">
            <div class="row g-3 mb-5">
              <div class="col-md-4">
                <label class="mb-2" for="name">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required />
              </div>
              <div class="col-md-4">
                <label class="mb-2" for="email">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required />
              </div>
              <div class="col-md-4">
                <label class="mb-2" for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required />
              </div>
              <div class="col-md-3">
                <label class="mb-2" for="check_in">Check In</label>
                <input type="date" class="form-control" id="check_in" name="check_in" required />
              </div>
              <div class="col-md-3">
                <label class="mb-2" for="check_out">Check Out</label>
                <input type="date" class="form-control" id="check_out" name="check_out" required />
              </div>
            </div>
  <!-- Additional Services -->
  <div class="row g-3 mb-4">
    <h6>Additional Services:</h6>
    <div class="col-md-4">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="rent-car" id="CheckRentCar" name="additional_services[]" />
        <label class="form-check-label" for="CheckRentCar">Rent Car Service</label>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="airport-pickup" id="airportPickup" name="additional_services[]" />
        <label class="form-check-label" for="airportPickup">Airport Pickup Service</label>
      </div>
    </div>
  </div>

  <!-- Rent Car Details -->
  <div class="rent-info" style="display: none;">
    <div class="row g-3 mb-5">
      <div class="col-md-4">
        <select class="form-select" name="car_name">
          <option value="">Select Car</option>
          <option value="Kia">Kia</option>
          <option value="Toyota">Toyota</option>
          <option value="Honda">Honda</option>
          <option value="Lexus">Lexus</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="mb-2" for="rental_start">Start of Rental</label>
        <input type="date" class="form-control" id="rental_start" name="rental_start" />
      </div>
      <div class="col-md-3">
        <label class="mb-2" for="rental_end">End of Rental</label>
        <input type="date" class="form-control" id="rental_end" name="rental_end" />
      </div>
    </div>
  </div>

  <!-- Airport Pickup Details -->
  <div class="arrived-info row mb-5" style="display: none;">
    <div class="col-md-3">
      <label class="mb-2" for="arrival_time">Airport Arrival Time</label>
      <input type="time" class="form-control" id="arrival_time" name="arrival_time" />
    </div>
  </div>

  <input type="hidden" value="<?php echo $_GET['room_id']; ?>" class="form-control" id="room_id" name="room_id" />
  <!-- Submit Button -->
  <div class="row g-3">
    <div class="col-md-4">
      <button class="btn btn-primary w-100 py-3 mb-2" type="submit">Submit</button>
    </div>
  </div>
</form>
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

    <script>
    function openLoginForm() {
      document.getElementById("myForm").style.display = "block";
    }
    
    function closeLoginForm() {
      document.getElementById("myForm").style.display = "none";
    }
  </script>

    <script>
    // Get the checkbox element and the info div
    const checkbox1 = document.getElementById('CheckRentCar');
    const checkbox2 = document.getElementById('airportPickup');
    const infoDiv1 = document.querySelector('.rent-info');
    const infoDiv2 = document.querySelector('.arrived-info');

    // Event listener to toggle the visibility
    checkbox1.addEventListener('change', function() {
        if (checkbox1.checked) {
            infoDiv1.style.display = 'block'; // Show the div when checked
        } else {
            infoDiv1.style.display = 'none';  // Hide the div when unchecked
        }
    });

    checkbox2.addEventListener('change', function() {
        if (checkbox2.checked) {
            infoDiv2.style.display = 'block'; // Show the div when checked
        } else {
            infoDiv2.style.display = 'none';  // Hide the div when unchecked
        }
    });
</script>
  </body>
</html>
