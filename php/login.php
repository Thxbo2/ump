<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'user_id' => $user['user_id'],
            'email' => $user['email'],
            'username' => $user['username']
        ];
        $_SESSION["logged"] = true;
        header("Location: ../home.php");
        exit();

    } else {
        echo "Invalid credentials.";

        
    }

}
?>