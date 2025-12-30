<?php
require_once 'modelBDD.php';

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
?>