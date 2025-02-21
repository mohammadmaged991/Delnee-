  <?php 
  session_start();
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
      <link
          href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
          rel="stylesheet">

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
      <div class="container bg-white p-0">

          <!-- Header -->
          <div class="container-fluid bg-dark px-0">
              <div class="row gx-0">
                  <div class="col-lg-4 bg-dark d-none d-lg-block">
                      <a href="index.php"
                          class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                          <h1 class="m-0 text-primary text-uppercase">delnee</h1>
                      </a>
                  </div>

                  <div class="col-lg-8">
                      <div class="row gx-0 bg-white d-flex">
                          <nav class="navbar n
                          
                          
                          avbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                              <a href="index.php" class="navbar-brand d-block d-lg-none">
                                  <h1 class="m-0 text-primary text-uppercase">Delnee</h1>
                              </a>
                              <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                                  data-bs-target="#navbarCollapse">
                                  <span class="navbar-toggler-icon"></span>
                              </button>
                              <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                  <div class="navbar-nav mr-auto py-0">
                                  <a href="hotels.php" class="nav-item nav-link" style="color: #FEA116;">Hotels</a>

                                      <a href="countries.php" class="nav-item nav-link">Countries</a>

                                      <a href="hotels.php" class="nav-item nav-link">Hotels</a>

                                      <a href="my_booking.php"
                                          class="nav-item nav-link <?php echo (!isset($_SESSION['username'])) ? 'd-none' : ''; ?>">My
                                          Booking</a>
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
                                              <input type="password" placeholder="Enter Password" name="password"
                                                  required>

                                              <button type="submit" class="btn">Login</button>

                                              <button type="button" class="btn cancel"
                                                  onclick="closeLoginForm()">Close</button>

                                              <div class="text-center pt-3">
                                                  <a type="button" class="btn sign-in bg-success"
                                                      href="sign_in.php">Sign In</a>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                          </nav>
                      </div>
                  </div>
              </div>
          </div>

          <!-- main photo -->
          <div class="container-fluid p-0 mb-5">
              <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                      <div class="carousel-item active">
                          <img class="w-100" src="img/carousel-1.jpg" alt="Image">

                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                              <div class="p-3" style="max-width: 700px;">
                                  <h1 class="text-white mb-4 animated slideInDown">Your gateway to the world of tourism
                                      in the Arab world</h1>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- What do we offer you at Delnee.com -->
          <div class="container-xxl py-5">
              <div class="container">
                  <div class="row g-5 align-items-center">
                      <div class="col-lg-12">
                          <h2 class="mb-4 text-center">What do we offer you at <span
                                  class="text-primary text-uppercase">Delnee.com? </span></h2>

                          <div class="row g-3 pb-4">
                              <div class="col-sm-4">
                                  <div class="border rounded p-1">
                                      <div class="border rounded text-center p-5">
                                          <h5 class="mb-1">Intermediary Platform</h5>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-4">
                                  <div class="border rounded p-1">
                                      <div class="border rounded text-center p-5">
                                          <h5 class="mb-1">Show tourist areas</h5>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-4">
                                  <div class="border rounded p-1">
                                      <div class="border rounded text-center p-5">
                                          <h5 class="mb-1">Show tourist hotels</h5>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Why should you use Delnee.com -->
          <div class="container-xxl py-5 mb-5">
              <div class="container">
                  <div class="text-center">
                      <h2 class="mb-4 text-center">Why should you use <span
                              class="text-primary text-uppercase">Delnee.com?</span></h2>
                  </div>

                  <div class="row g-4">
                      <div class="col-lg-4 col-md-6">
                          <a class="benifits-item rounded" href="#">
                              <div class="benifits-icon bg-transparent border rounded p-1">
                                  <div
                                      class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                      <i class="fas fa-dollar-sign fa-2x text-primary"></i>
                                  </div>
                              </div>

                              <h5 class="mb-3">Costs</h5>

                              <p class="text-body mb-0">Save money before moving to any destination and get the best
                                  services that suit your financial capacity.</p>
                          </a>
                      </div>

                      <div class="col-lg-4 col-md-6">
                          <a class="benifits-item rounded" href="#">
                              <div class="benifits-icon bg-transparent border rounded p-1">
                                  <div
                                      class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                      <i class="fas fa-eye fa-2x text-primary"></i>
                                  </div>
                              </div>

                              <h5 class="mb-3">Overview</h5>

                              <p class="text-body mb-0">Get an overview of any destination you prefer to go to.</p>
                          </a>
                      </div>

                      <div class="col-lg-4 col-md-6">
                          <a class="benifits-item rounded" href="#">
                              <div class="benifits-icon bg-transparent border rounded p-1">
                                  <div
                                      class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                      <i class="fas fa-clock fa-2x text-primary"></i>
                                  </div>
                              </div>

                              <h5 class="mb-3">Time</h5>

                              <p class="text-body mb-0">Save time searching for information about tourist sites and
                                  hotels.</p>
                          </a>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Footer -->
          <div class="container-fluid bg-dark text-light footer">
              <div class="container">
                  <div class="row g-5">
                      <div class="col-md-6 col-lg-4">
                          <div class="bg-primary rounded p-4">
                              <a href="index.php">
                                  <h1 class="text-white text-uppercase mb-3">delnee</h1>
                              </a>

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

                                  <a href="my-booking.php"
                                      class="nav-item nav-link <?php echo (!isset($_SESSION['username'])) ? 'd-none' : ''; ?>">My
                                      Booking</a>
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
              </div>

              <!-- Copyright -->
              <div class="container-fluid text-center text-white bg-dark py-3">
                  <p class="m-0">© 2025 <a class="text-primary" href="#">Delnee</a>. All Rights Reserved.</p>
              </div>

          </div>

          <!-- JavaScript Libraries -->
          <script src="js/main.js"></script>

          <script>
          function openLoginForm() {
              document.getElementById("myForm").style.display = "block";
          }

          function closeLoginForm() {
              document.getElementById("myForm").style.display = "none";
          }

          $(window).onclick = function(event) {
              var formPopup = document.getElementById("myForm");
              if (event.target === formPopup) {
                  closeLoginForm();
              }
          }
          </script>
  </body>

  </html>