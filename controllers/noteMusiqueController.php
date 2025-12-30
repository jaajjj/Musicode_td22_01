<?php
require_once __DIR__ . '/../models/modelMusique.php';

if(isset($_GET['id_mus'], $_GET['id_user'], $_GET['note'])) {
    $id_user = $_GET['id_user'];
    $id_mus = $_GET['id_mus'];
    $note = $_GET['note'];
    if(update_note_musique($id_user, $id_mus, $note)) {
        $_SESSION['message_success'] = "Note mise à jour avec succès !";
    } else {
        $_SESSION['message_error'] = "Erreur lors de la mise à jour de la note.";
    }

    header('Location: ' . getenv('BASE_URL') . 'bibliotheque');
    exit();
} else {
    $_SESSION['message_error'] = "Informations manquantes pour la mise à jour de la note.";
    header('Location: ' . getenv('BASE_URL') . 'bibliotheque');
    exit();
}
