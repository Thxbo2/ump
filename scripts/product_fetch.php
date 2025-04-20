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
?>