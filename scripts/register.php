<?php
require_once 'database.php';
require_once 'logs.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    create_user($connection, $username, $email, $password);
    
} else {
    header("Location: ../register.php?error=Invalid_request_method.");
    exit(); // Ensure no further code is executed after the redirect
}

function create_user($connection, $username, $email, $password)
{
    try {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $statement = $connection->prepare("INSERT INTO users (username,email, password) VALUES (?,?,?)");
        $statement->execute([$username, $email, $hashed_password]);
        header("Location: ../login.php"); // Redirect to login page
    } catch (PDOException $e) {
        // Log the error message (optional) and display a user-friendly message
        log_error($connection, $e->getMessage() . "Failed registration attempt", "Registration", $email);
        header("Location: ../register.php?error=Registration_failed. Please_try_again_later."); // Redirect to register page with error message
    }
}
?>