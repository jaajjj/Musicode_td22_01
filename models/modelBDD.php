<?php
function get_bdd() {
    $hostname = $_ENV['DB_HOST'];
    $db_name  = $_ENV['DB_NAME'];
    $user     = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];

    $dsn = "mysql:host=$hostname;dbname=$db_name;charset=utf8mb4";

    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    return $pdo;
}
?>

