<?php
session_start();
require 'php/connection.php';

// if (!isset($_SESSION['logged'])) {
//     header("Location: index.php");
//     exit;
// }

// Get order data for customer
$stmt = $pdo->prepare("SELECT * FROM orders");
$stmt->execute();
$order = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders - UMP</title>
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
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Buyer Name</th>
                <th>Email</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order as $item) { ?>
                <tr>
                    <td><?php echo $item['product_id']; ?></td>
                    <td><?php echo $item['buyer_name']; ?></td>
                    <td><?php echo $item['buyer_email']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo $item['total']; ?></td>
                    <td><?php echo $item['status']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table> 
  </main>
</body>
</html>