<?php
session_start();
require_once 'database.php';

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id;

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $customer_id = $result['id']; // Fetch the user_id from the query result

    if ($stmt->rowCount() > 0) {
        $_SESSION['logged'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user_id;
        header("Location: ../user_dashboard.php"); // Redirect to dashboard page
        exit(); // Ensure no further code is executed after the redirect
    } else {
        echo "<script>alert('Invalid login credentials')</script>";
        header("Location: ../login.php"); // Redirect to dashboard page
        exit(); // Ensure no further code is executed after the alert
    }
} else {
    echo "<script>alert(Invalid login attempt.)</script>";
    header("Location: ../user_dashboard.php"); // Redirect to dashboard page
    exit(); // Ensure no further code is executed if the request method is not POST
}
?>