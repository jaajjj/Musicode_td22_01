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
function inscription($username, $password, $email){
    $pdo = get_bdd();
    $stmt = $pdo->prepare("
        INSERT INTO USER (nom_user,mail_user,mdp_user )
        VALUES (?, ?, ?)
    ");
    return $stmt->execute([$username, $email, $password]);
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

function get_compte_user(int $idUser) {
    $pdo = get_bdd();
    $sql = "SELECT id_user, nom_user, mail_user, mdp_user
            FROM USER
            WHERE id_user = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idUser]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function update_compte_nom(int $idUser, string $nom): bool {
    $pdo = get_bdd();
    $sql = "UPDATE USER SET nom_user = ? WHERE id_user = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nom, $idUser]);
}

function update_compte_nom_mdp(int $idUser, string $nom, string $hashedPassword): bool {
    $pdo = get_bdd();
    $sql = "UPDATE USER SET nom_user = ?, mdp_user = ? WHERE id_user = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nom, $hashedPassword, $idUser]);
}