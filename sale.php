<?php
session_start();
// Retrieve error and success messages from the session
$error = !empty($_SESSION['error']) ? $_SESSION['error'] : null;
$success = !empty($_SESSION['success']) ? $_SESSION['success'] : null;

// Clear the messages from the session after retrieving them
unset($_SESSION['error']);
unset($_SESSION['success']);

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="website best for goods exchange">
    <meta name="author" content="Thabo Siliya">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Universal Media Platform</title>

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
            <span><marquee behavior="" direction="left">Large sale on smartphones, laptops and shoes!</marquee></span>
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
            <li class="nav-item">
              <a class="nav-link" href="marketplace.php">Marketplace</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="sale.php">Sale
                <span class="sr-only">(current)</span>
              </a>
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
    <!-- Featured Starts Here -->
    <div class="contact-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Sale product today!</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <div class="container">
                <form id="sale-form" action="scripts/sale_product.php" method="POST" enctype="multipart/form-data">
                  <!-- Display error or success messages -->
                  <?php if ($error): ?>
                      <div class="alert alert-danger" role="alert">
                          <?php echo htmlspecialchars($error); ?>
                      </div>
                  <?php endif; ?>

                  <?php if ($success): ?>
                      <div class="alert alert-success" role="alert">
                          <?php echo htmlspecialchars($success); ?>
                      </div>
                  <?php endif; ?>
                  <div class="row">
                    <div class="col-md-6">
                      <fieldset>
                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product name..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <select name="product_category" id="product_category" class="form-control" required="">
                          <option value="" disabled selected>Select product category...</option>
                          <option value="electronics">Electronics</option>
                          <option value="clothing">Clothing</option>
                          <option value="shoes">Shoes</option>
                          <option value="accessories">Accessories</option>
                          <option value="furniture">Furniture</option>
                          <option value="books">Books</option>
                          <option value="toys">Toys</option>
                          <option value="sports">Sports</option>
                          <option value="other">Other</option>
                        </select>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <textarea name="product_description" id="product_description" rows="6" class="form-control" placeholder="Product description..." required=""></textarea>
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <input type="number" class="form-control" name="product_price" id="product_price" placeholder="Product price (MWK)..." required="" min="1">
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <input type="number" class="form-control" name="product_quantity" id="product_quantity" placeholder="Quantity..." required="" min="1">
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <input type="file" class="" name="product_image" id="product_image" placeholder="Product image..." required="" accept="jpg, jpeg, png" onchange="previewImage(event)">
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">Sale</button>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <div class="share">
                        <h6>You can also keep in touch on: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div> <!-- col-md-6 ends here -->
          <div class="col-md-6">
              <img id="image_preview" src="assets/images/sale-bg.jpg" width="100%" alt="Product Preview" style="border-radius: 10px; display: none;">
          </div>
        </div>
      </div>
    </div>
    <!-- Sale Product Ends Here -->    
    
    <!-- Footer Starts Here -->
     <?php include 'partials/footer.php'; ?>
    <!-- Footer Ends Here -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/preview-img.js"></script>
    <script src="assets/js/retain-progress.js"></script>

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
