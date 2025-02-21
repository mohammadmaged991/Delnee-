<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "delnee";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['country_id'])) {
        $countryId = intval($_GET['country_id']);
        // Fetch hotels for the selected country
        $hotelsQuery = $pdo->prepare("SELECT * FROM hotels WHERE country_id = :country_id");
        $hotelsQuery->bindParam(':country_id', $countryId, PDO::PARAM_INT);
        $hotelsQuery->execute();

        // Check if there are any hotels found
        if ($hotelsQuery->rowCount() > 0) {
          while ($row = $hotelsQuery->fetch(PDO::FETCH_ASSOC)) {
            $imageData = $row['image']; // Assuming 'image' is the BLOB column

          // Output hotel details
          echo '<div class="col-lg-4 col-md-6 wow fadeInUp mb-5" data-wow-delay="0.1s">';
          echo '<div class="room-item shadow rounded overflow-hidden">';
          echo '<div class="position-relative">';
          if ($imageData) {
            $imageType = 'image/jpeg'; // Assuming the BLOB data is a JPEG
            echo '<img src="data:' . $imageType . ';base64,' . base64_encode($imageData) . '" max-width="500px" height="168px" alt="Image of ' . htmlspecialchars($row['name']) . '">';
          } else {
            echo '<img src="img/default.jpg" width="100%" height="168px" alt="Image not available">';
          }          
          echo '</div>';
          echo '<div class="p-4 mt-2">';
          echo '<div class="d-flex justify-content-between mb-3">';
          echo '<h5 class="mb-0">' . htmlspecialchars($row['name']) . '</h5>';
          echo '<div class="ps-2">';
                
          // Output stars dynamically based on the number of stars
          for ($i = 1; $i <= $row['number_of_stars']; $i++) {
            echo '<small class="fa fa-star text-primary"></small>';
          }
          
          echo '</div></div>
            <div class="book-now">
              <a class="btn btn-sm btn-warning text-white rounded py-2 px-4" href="rooms.php?hotel_id=' . $row['id'] . '">Show Rooms</a>
            </div>
          </div>
      </div>
        </div>';
              }
        } else {
            echo '<p>No hotels found for this selection.</p>';
        }
    } else {
        echo '<p>Please select country.</p>';
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>