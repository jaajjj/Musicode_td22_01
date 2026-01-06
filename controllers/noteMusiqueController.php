<?php
require_once __DIR__ .'/../models/modelMusique.php';

if(isset($_GET['id_mus'], $_GET['id_user'], $_GET['note'])) {
    $id_user = $_GET['id_user'];
    $id_mus = $_GET['id_mus'];
    $note = $_GET['note'];
    if($note < 0 || $note > 5) {
        $_SESSION['message_error'] = "La note doit être comprise entre 0 et 5";
        header('Location: '.getenv('BASE_URL') . 'library');
        exit();
    }
    if(update_note_musique($id_user, $id_mus, $note)) {
        $_SESSION['message_success'] = "Note mise à jour avec succès";
    } else {
        $_SESSION['message_error'] = "Erreur lors de la mise à jour de la note";
    }

    header('Location: '.getenv('BASE_URL') .'library');
    exit();
} else {
    $_SESSION['message_error'] = "Informations manquantes pour la mise à jour de la note";
    header('Location: '.getenv('BASE_URL').'library');
    exit();
}
