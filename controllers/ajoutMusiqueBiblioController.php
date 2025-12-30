<?php
require_once __DIR__ . '/../models/modelMusique.php';

if (isset($_GET['id_mus']) && isset($_SESSION['user']['id_user'])){
    $id_user = $_SESSION['user']['id_user'];
    $id_mus = $_GET['id_mus'];
    
    if (ajouter_musique_to_bibliotheque($id_user, $id_mus)) {
        $_SESSION['message_success'] = "Musique ajoutée à votre bibliothèque !";
    } else {
        $_SESSION['message_error'] = "Erreur lors de l'ajout à la bibliothèque.";
    }
    
    header('Location: ' . getenv('BASE_URL') . 'bibliotheque');
    exit();
}
