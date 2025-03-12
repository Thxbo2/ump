<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - UMP</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <h1>Login</h1>
    <nav>
      <a href="index.php">Home</a>
      <a href="register.php">Register</a>
      <a href="login.php">Login</a>
      <a href="search.php">Search Products</a>
    </nav>
  </header>
  <main>
    <form action="php/login.php" method="POST">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit">Login</button>
    </form>
  </main>
</body>
</html>