<?php


function get_bdd(){
    $hostname = getenv('DB_HOST');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');
    $db_name =  getenv('DB_NAME');

    $dsn = "mysql:host=$hostname;dbname=$db_name;charset=utf8mb4";
    $pdo =  new PDO($dsn, $user, $password);

    return $pdo;
}


