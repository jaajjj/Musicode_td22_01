<?php 
require_once 'modelBDD.php';
function get_all_musiques(){
    $pdo = get_bdd();
    $stmt = $pdo->prepare("SELECT * FROM MUSIQUE");
    $stmt->execute();
    $musiques = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $musiques;
}

function get_duree($secondes) {
    $minutes = floor($secondes / 60);
    $sec = $secondes % 60;
    return sprintf('%02d"%02d"', $minutes, $sec);
}

function get_musique_by_id($id) {
    $pdo = get_bdd();
    $stmt = $pdo->prepare("SELECT * FROM MUSIQUE WHERE id_mus = $id");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}