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

function ajouter_musique($titre, $artiste, $album, $duree) {
    $pdo = get_bdd();
    $stmt = $pdo->prepare("INSERT INTO MUSIQUE (titre_mus, auteur_mus, album_mus, duree_mus) VALUES (:titre, :auteur, :album, :duree)");
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':auteur', $artiste);
    $stmt->bindParam(':album', $album);
    $stmt->bindParam(':duree', $duree);
    return $stmt->execute();
}

function ajouter_musique_to_bibliotheque($id_user, $id_mus){
    $pdo = get_bdd();
    $stmt = $pdo->prepare("INSERT INTO BIBLIOTHEQUE (id_user, id_mus) VALUES (?, ?)");
    return $stmt->execute([$id_user, $id_mus]);
}

function get_musique_biblio($id_user){
    $pdo = get_bdd();
    $stmt = $pdo->prepare("SELECT M.*, B.note_mus FROM MUSIQUE M JOIN BIBLIOTHEQUE B ON M.id_mus = B.id_mus WHERE B.id_user = ?");
    $stmt->execute([$id_user]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function update_note_musique($id_user, $id_mus, $note){
    $pdo = get_bdd();
    $stmt = $pdo->prepare("UPDATE BIBLIOTHEQUE SET note_mus = ? WHERE id_user = ? AND id_mus = ?");
    return $stmt->execute([$note, $id_user, $id_mus]);
}
function supprimer_musique_biblio($id_user, $id_mus){
    $pdo = get_bdd();
    $stmt = $pdo->prepare("DELETE FROM BIBLIOTHEQUE WHERE id_user = ? AND id_mus = ?");
    return $stmt->execute([$id_user, $id_mus]);
}

function musique_existe_in_biblio($id_user, $id_mus){
    $pdo = get_bdd();
    $stmt = $pdo->prepare("SELECT * FROM BIBLIOTHEQUE WHERE id_user = ? AND id_mus = ?");
    $musique = $stmt->execute([$id_user, $id_mus]);
    if($stmt->fetch()){
        return true;
    }
    return false;
}