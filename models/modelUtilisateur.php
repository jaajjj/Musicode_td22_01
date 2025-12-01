<?php
require_once 'modelBDD.php';

function get_user() {
    $pdo = get_bdd();
    $sql = "SELECT * FROM USER";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function get_user_by_email(string $email) {
    $pdo = get_bdd();
    $sql = "SELECT * FROM USER WHERE mail_user = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function create_user(string $email, string $password): bool {
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


    // hash sécurisé (bcrypt via PASSWORD_DEFAULT)
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO USER (mail_user, mdp_user) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$email, $hash]);
}


function verify_user(string $email, string $password) {
    $user = get_user_by_email($email);
    if (!$user) {
        return false;
    }
    $hash = $user['mdp_user'];

    if (password_verify($password, $hash) || $password === $hash) {
        return $user;
    }
    return false;
}
