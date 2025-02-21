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

      <!-- Search Boxes -->
      <div
        class="container-fluid booking pb-5 wow fadeIn"
        data-wow-delay="0.1s"
      >
        <div class="container">
          <div class="bg-white shadow" style="padding: 35px">
            <div class="row g-2">
              <div class="col-md-12">
                <div class="row g-2">
                  <div class="col-md-">
                    <select id="countryId" class="form-select" onchange="fetchHotels()">
                    <option selected>Select Country</option>
                    <option value="20">Jordan</option>
                    <option value="21">Lebanon</option>
                    <option value="22">Syria</option>
                    </select>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- items -->
      <div class="container-xxl py-5">
        <div class="container">
          <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">
              Our Hotels
            </h6>
            <h1 class="mb-5">
              Explore Our <span class="text-primary text-uppercase">Hotels</span>
            </h1>
          </div>
         
          <!-- Hotels List Container -->
          <div id="hotelsContainer" class="row g-4"></div>
        </div>
      </div>

    <!-- Footer -->
    <div class="container-fluid bg-dark text-light footer">
      <div class="container">
        <div class="row g-5">
          <div class="col-md-6 col-lg-4">
            <div class="bg-primary rounded p-4">
              <a href="index.php"><h1 class="text-white text-uppercase mb-3">delnee</h1></a>
                        
              <p class="text-white mb-0">
                  Enjoy getting the best information about the tourist places
                  and hotels available for your favorite destination easily, and
                  you can also book hotels within the best options provided.
              </p>
            </div>
          </div>
                
          <div class="col-md-6 col-lg-3">
            <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                    
            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Yarmook university, Irbid, JO </p>
                    
            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    
            <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    
              <div class="d-flex pt-2">
                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        
                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        
                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        
                <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
              </div>
          </div>
                
          <div class="col-lg-5 col-md-12">
            <div class="row gy-5 g-4">
              <div class="col-md-6">
                <h6 class="section-title text-start text-primary text-uppercase mb-4">Pages</h6>
                            
                <a class="btn btn-link" href="index.php">Home</a>
                            
                <a class="btn btn-link" href="countries.php">Countries</a>
                            
                <a class="btn btn-link" href="hotels.php">Hotels</a>
                            
                <a href="my_booking.php" class="nav-item nav-link <?php echo (!isset($_SESSION['username'])) ? 'd-none' : ''; ?>">My Booking</a>
                </div>

              <div class="col-md-6">
                <h6 class="section-title text-start text-primary text-uppercase mb-4">Developers</h6>
                
                <div class="d-flex justify-content-between">
                  <p class="mb-2"><i class="fa fa-user-alt me-3"></i>Mohammad Zeghan</p>
                </div> 

                <div class="d-flex justify-content-between">
                  <p class="mb-2"><i class="fa fa-user-alt me-3"></i>Jawad Mansi</p>
                </div>

                <div class="d-flex justify-content-between">
                  <p class="mb-2"><i class="fa fa-user-alt me-3"></i>Kareem Jaradat</p>
                </div>

                <div class="d-flex justify-content-between">
                  <p class="mb-2"><i class="fa fa-user-alt me-3"></i>Rami Tabbaa</p>
                </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="container">
        <div class="copyright">
          <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
              &copy; <a class="border-bottom" href="#">Delnee</a>, All Right Reserved - 2024-2025. 
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

    <script>
    function openLoginForm() {
      document.getElementById("myForm").style.display = "block";
    }
    
    function closeLoginForm() {
      document.getElementById("myForm").style.display = "none";
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    function fetchHotels() {      
      const countryId = document.getElementById('countryId').value;

      if (countryId ) {
        // Make an AJAX request to the server to get hotels
        $.ajax({
          url: 'fetch_hotels.php', // PHP file to fetch hotels
          type: 'GET',
          data: { country_id: countryId}, // Send country
          success: function(response) {
            $('#hotelsContainer').html(response); // Display the returned hotels list
          },
          error: function(xhr, status, error) {
            ini_set('display_errors', 1);
            alert('Error fetching hotels: ' + error); // Handle errors
          }
        });
      } else {
        $('#countriesContainer').html(''); // Clear hotels if no country selected
    }
  }
  </script>
  </body>
</html>
