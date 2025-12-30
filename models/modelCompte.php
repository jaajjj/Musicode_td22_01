<?php
require_once 'modelBDD.php';

function get_all_musiques() {
    $pdo = get_bdd();
    // Correspond à CREATE TABLE MUSIQUE ...
    $stmt = $pdo->query("SELECT id_mus, auteur_mus, titre_mus, album_mus, duree_mus FROM MUSIQUE");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_musique_by_id(int $id) {
    $pdo = get_bdd();
    $stmt = $pdo->prepare("SELECT id_mus, auteur_mus, titre_mus, album_mus, duree_mus 
                           FROM MUSIQUE 
                           WHERE id_mus = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_duree(int $secondes): string {
    $minutes = intdiv($secondes, 60);
    $sec = $secondes % 60;
    return sprintf('%02d"%02d"', $minutes, $sec);
}
