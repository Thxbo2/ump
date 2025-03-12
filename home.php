<?php
session_start();
require 'php/connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Universal Marketplace Platform</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <header>
    <h1>Universal Marketplace Platform</h1>
    <nav>
      <a href="home.php">Home</a>
      <a href="sale.php">Sale</a>
      <a href="buy.php">Buy</a>
      <a href="search.php">Search Products</a>
      <a href="order.php">Orders</a>
      <a href="php/logout.php">Logout</a>
    </nav>
  </header>
  <main>
    <section>
      <h2>Welcome User</h2>
      <p>Buy and sell new and second-hand items securely.</p>
    </section>
  </main>
</body>
</html>