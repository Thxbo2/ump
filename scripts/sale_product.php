<?php
session_start();
require_once 'database.php';
require_once 'logs.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $user_id = $_SESSION['user_id'];
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $image = $_FILES['product_image']['name'];
    $description = $_POST['product_description'];
    $quantity = $_POST['product_quantity'];

    // Validate inputs
    if (empty($name) || empty($price) || empty($image) || empty($description) || $quantity) {
        log_error($connection, "Failed to capture all fields", "Product sale", $_SESSION['email']);
        $_SESSION['error'] = "Field capture error, try again later"; // Set error message in session
        header("Location: ../sale.php?error=All_fields_are_required.");
        exit();
    }

    // Move the uploaded image to the desired directory
    move_uploaded_file($_FILES['product_image']['tmp_name'], "../images/products/" . $image);

    // Create the product
    create_product($connection, $user_id, $name, $price, $image, $description);
    
} else {
    log_error($connection, "Invalid request method", "Product sale", $_SESSION['email']);
    $_SESSION['error'] = "Invalid request method"; // Set error message in session
    header("Location: ../sale.php?error=Invalid_request_method.");
    exit();
}

function create_product($connection, $user_id, $name, $price, $image, $description, $quantity)
{
    $statement = $connection->prepare("INSERT INTO products (seller_id, name, price, image, description, quantity) VALUES (?,?,?,?,?)");
    $statement->execute([$user_id, $name, (int) $price, $image, $description, $quantity]);
}
?>