<?php
require_once 'database.php';
require_once 'logs.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $user_id = $_SESSION['user_id'];
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $image = $_FILES['product_image']['name'];
    $description = $_POST['description'];

    // Validate inputs
    if (empty($name) || empty($price) || empty($image) || empty($description)) {
        header("Location: ../sale.php?error=All fields are required.");
        exit();
    }

    // Check if the product already exists
    if (crosscheck_product($connection, $name)) {
        header("Location: ../sale.php?error=Product already exists.");
        exit();
    }

    // Move the uploaded image to the desired directory
    move_uploaded_file($_FILES['product_image']['tmp_name'], "../images/products/" . $image);

    // Create the product
    create_product($connection, $user_id, $name, $price, $image, $description);
    
} else {
    header("Location: ../sale.php?error=Invalid_request_method.");
    exit();
}
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $image = $_FILES['product_image']['name'];
    $description = $_POST['description'];

    // Validate inputs
    if (empty($name) || empty($price) || empty($image) || empty($description)) {
        header("Location: ../sale.php?error=All_fields_are_required.");
        exit(); // Ensure no further code is executed after the redirect
    }

    // Move uploaded image to a specific directory (e.g., 'uploads/')
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
    move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);

    create_product($connection, $user_id, $name, $price, $image, $description);
} else {
    header("Location: ../sale.php?error=Invalid_request_method.");
    exit(); // Ensure no further code is executed after the redirect
}

function create_product($connection, $user_id, $name, $price, $image, $description)
{
    $statement = $connection->prepare("INSERT INTO products (seller_id,name, price,image,description) VALUES (?,?,?,?,?)");
    $statement->execute([$user_id, $name, (int) $price, $image, $description]);
}
?>