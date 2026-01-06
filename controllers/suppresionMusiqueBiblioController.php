<?php 
require_once __DIR__ .'/../models/modelMusique.php';

if (isset($_GET['id_mus']) && isset($_GET['id_user'])){
    $id_user = $_GET['id_user'];
    $id_mus = $_GET['id_mus'];

    if (supprimer_musique_biblio($id_user, $id_mus)) {
        $_SESSION['message_success'] = "Musique retirée de votre bibliothèque";
    } else {
        $_SESSION['message_error'] = "Erreur lors de la suppression de la musique";
    }

    header('Location: '. getenv('BASE_URL').'library');
    exit();
}

