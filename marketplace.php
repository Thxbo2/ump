<?php
session_start();
require_once 'scripts/database.php';
require_once 'scripts/logs.php'; // Include the logs.php file for logging functionality
require_once 'scripts/product_fetch.php';

 // check if the user logged in properly
if (!isset($_SESSION['logged'])) {
  echo "<script>alert('You are not authorized')</script>";
  header("Location: index.php");
  exit;
}

// Fetch products from the database
$products = fetch_all_products($connection);
if ($products === false) {
    // Handle error fetching products
    echo "<script>alert('Error fetching products. Please try again later.')</script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="website best for goods exchange">
    <meta name="author" content="Thabo Siliya">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>
    
    <!-- Pre Header -->
    <div id="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php include 'partials/marquee.php'; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/images/header-logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="marketplace.php">Marketplace
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sale.php">Sale</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="scripts/logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="caption">
              <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
              <div class="line-dec"></div>
              <p>Universal market place is still growing as a community and platform. <strong>3 major</strong> features are available to you as a user, viewing, ordering and and keeping track of your products. 
              <br><br>Please tell your friends about <a rel="nofollow" href="#">Universal Market Place</a> so that we grow as a community with products and support.</p>
              <div class="main-button">
                <a href="#">Order Now!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <!-- Featured Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Featured Items</h1>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
              <?php foreach ($products as $product): ?>
                <a href="single-product.php?id=<?php echo $product['id']; ?>">
                    <div class="featured-item">
                        <img src="images/products/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <h4><?php echo htmlspecialchars($product['name']); ?></h4>
                        <h6>MWK<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></h6>
                    </div>
                </a>
              <?php endforeach; ?>
            </div> <!-- owl-carousel ends here -->
          </div> <!-- col-md-12 ends here -->
        </div> <!-- row ends here -->
      </div> <!-- container ends here -->
    </div>
    <!-- Featred Ends Here -->


    <!-- Subscribe Form Starts Here -->
    <?php include 'partials/subscribe.php'; ?>
    <!-- Subscribe Form Ends Here -->
    
    <!-- Footer Starts Here -->
     <?php include 'partials/footer.php'; ?>
    <!-- Footer Ends Here -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
