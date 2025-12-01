<?php 
require_once 'modelBDD.php';
function get_user(){
    $pdo = get_bdd();
    $stmt = $pdo->prepare("SELECT * FROM USER");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function inscription($username, $password, $email){
    $pdo = get_bdd();
    $stmt = $pdo->prepare("
        INSERT INTO user (nom_user,mail_user,mdp_user )
        VALUES (?, ?, ?)
    ");
    return $stmt->execute([$username, $email, $password]);
}
