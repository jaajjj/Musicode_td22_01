<?php 
require_once 'modelBDD.php';
function get_user(){
    $pdo = get_bdd();
    $stmt = $pdo->prepare("SELECT * FROM USER_");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}
