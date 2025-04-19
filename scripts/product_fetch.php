<?php
// Fetch products from the database
try {
    $stmt = $connection->prepare("SELECT * FROM products");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all products as an associative array
} catch (PDOException $e) {
    log_error($connection, $e->getMessage(), "Error fetching products", $_SESSION['email']);
    echo "Error fetching products: " . $e->getMessage();
    exit();
}
?>