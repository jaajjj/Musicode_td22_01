<?php
require_once __DIR__ .'/../models/modelMusique.php';

$successMessage = isset($successMessage) ? $successMessage : '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $titre =$_POST['titre'] ?? '';
    $artiste = $_POST['artiste'] ?? '';
    $album = $_POST['album'] ?? '';
    $duree_min = isset($_POST['duree_min']) ? (int)$_POST['duree_min'] : 0;
    $duree_sec = isset($_POST['duree_sec']) ? (int)$_POST['duree_sec'] : 0;

    $duree_totale = ($duree_min * 60) + $duree_sec;

        
    $insertion_success = ajouter_musique($titre, $artiste, $album, $duree_totale);

    if ($insertion_success) {
        $successMessage = "Musique ajoutée avec succès";
    }
    
}
require_once __DIR__ .'/../views/nouvelleMusique.php';

