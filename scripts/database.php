<?php
$host = 'localhost';
$dbname = 'ump_db';
$username = 'root';
$password = '';

$connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

function fetch_user_by_id($connection, $id)
{
    $statement = $connection->prepare("SELECT * FROM users WHERE id=?");

    $statement->execute([$id]);

    $result = $statement->fetch();

    if (! $result) {
        return null;
    }

    return $result;
}

function fetch_user_by_email($connection, $id)
{
    $statement = $connection->prepare("SELECT * FROM users WHERE email=?");

    $statement->execute([$id]);

    $result = $statement->fetch();

    if (! $result) {
        return null;
    }

    return $result;
}


function create_user($connection, $username, $email, $password)
{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $statement = $connection->prepare("INSERT INTO users (username,email, password) VALUES (?,?,?)");
    $statement->execute([$username, $email, $hashed_password]);
}


function get_all_products($connection)
{
    $statement = $connection->prepare("SELECT * FROM products");
    $statement->execute();

    return $statement->fetchAll();
}

function get_user_products($connection, $user_id)
{
    $statement = $connection->prepare("SELECT * FROM products where seller_id is not null and seller_id = ?");
    $statement->execute([$user_id]);

    return $statement->fetchAll();
}

function get_products_with_search(PDO $connection, $search)
{
    $search = "%$search%";
    $statement = $connection->prepare("SELECT * FROM products WHERE name like :search or description like :search");
    $statement->execute([':search' => $search]);

    return $statement->fetchAll();
}


function create_product($connection, $user_id, $name, $price, $image, $description)
{
    $statement = $connection->prepare("INSERT INTO products (seller_id,name, price,image,description) VALUES (?,?,?,?,?)");
    $statement->execute([$user_id, $name, (int) $price, $image, $description]);
}


function get_product_by_id($connection, $id)
{
    $statement = $connection->prepare("SELECT * FROM products WHERE id=?");
    $statement->execute([(int) $id]);

    $result = $statement->fetch();

    if (! $result) {
        return null;
    }

    return $result;
}