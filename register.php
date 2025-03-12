<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - UMP</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <h1>Register</h1>
    <nav>
      <a href="index.php">Home</a>
      <a href="register.php">Register</a>
      <a href="login.php">Login</a>
      <a href="search.php">Search Products</a>
    </nav>
  </header>
  <main>
    <form action="php/register.php" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="username" required>
      
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit">Register</button>
    </form>
  </main>
</body>
</html>