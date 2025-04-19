<?php
session_start();
require_once 'database.php';

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $connection->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && password_verify($password, $result['password'])) {
        // Password is correct, set session variables
        $_SESSION['logged'] = true;
        $_SESSION['email'] = $result['email'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['user_id'] = $result['id'];
        header("Location: ../marketplace.php"); // Redirect to dashboard page
        exit(); // Ensure no further code is executed after the redirect
    } else {
        // Invalid credentials
        $_SESSION['error'] = "Invalid email or password"; // Set error message in session
        log_error($connection, "Invalid email or password", "Login", $email);
        header("Location: ../login.php?Invalid_credentials"); // Redirect to login page
        exit(); // Ensure no further code is executed after the redirect
    }
} else {
    $_SESSION['error'] = "Invalid request method";
    log_error($connection, "Invalid request method", "Login", $email);
    header("Location: ../index.php?Invalid_request_method"); // Redirect to dashboard page
    exit(); // Ensure no further code is executed if the request method is not POST
}
?>