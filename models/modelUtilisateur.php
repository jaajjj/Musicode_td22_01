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

// pour l’instant tes mots de passe en BDD sont en clair (mdpAlice123…)
// donc on NE hash PAS ici, on garde simple.
// Quand tu migreras, tu remettras password_hash/password_verify.
function create_user(string $email, string $password): bool {
    $pdo = get_bdd();
    $sql = "INSERT INTO USER (mail_user, mdp_user) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$email, $password]);
}

function verify_user(string $email, string $password) {
    $user = get_user_by_email($email);
    if (!$user) {
        return false;
    }
    if ($password === $user['mdp_user']) {
        return $user;
    }
    return false;
}
