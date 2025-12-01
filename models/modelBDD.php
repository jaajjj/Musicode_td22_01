<?php


function get_bdd(){
    $hostname = $_ENV['DB_HOST'];
    $user = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];
    $db_name =  $_ENV['DB_NAME'];

    $dsn = "mysql:host=$hostname;dbname=$db_name;charset=utf8mb4";
    $pdo =  new PDO($dsn, $user, $password);

    return $pdo;
}


