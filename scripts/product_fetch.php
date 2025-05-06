<?php
// Fetch products from the database
function fetch_all_products($connection) {
    try {
        $stmt = $connection->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all products as an associative array
    } catch (PDOException $e) {
        log_error($connection, $e->getMessage(), "Error fetching products", $_SESSION['email']);
        return false;
    }
}

// Fetch single product by ID
function fetch_product_by_id($connection, $product_id) {
    try {
        $stmt = $connection->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the product as an associative array
    } catch (PDOException $e) {
        log_error($connection, $e->getMessage(), "Error fetching product by ID", $_SESSION['email']);
        return false;
    }
}
?>