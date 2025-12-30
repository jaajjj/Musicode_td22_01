<?php
require_once __DIR__ . '/../models/modelUtilisateur.php';

$idUser = (int) $_SESSION['user']['id_user'];
$user   = get_compte_user($idUser);

$displayName    = $user['nom_user'];
$successMessage = '';
$errorMessage   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $displayName = $_POST['display_name'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';
    $confirm     = $_POST['confirm_password'] ?? '';

    if ($displayName === '') {
        $errorMessage = "Le nom d’affichage est obligatoire.";
    } elseif (($newPassword !== '' || $confirm !== '') && $newPassword !== $confirm) {
        $errorMessage = "Les mots de passe ne correspondent pas.";
    } elseif ($newPassword !== '' && strlen($newPassword) < 6) {
        $errorMessage = "Le mot de passe doit contenir au moins 6 caractères.";
    } else {
        if ($newPassword === '' && $confirm === '') {
            $ok = update_compte_nom($idUser, $displayName);
        } else {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $ok = update_compte_nom_mdp($idUser, $displayName, $hashedPassword);
        }

        if ($ok) {
            $_SESSION['user']['nomUser'] = $displayName;
            $successMessage = "Votre compte a bien été mis à jour :)";
        } else {
            $errorMessage = "Une erreur est survenue lors de la mise à jour, ressayez :(";
        }
    }
}

require __DIR__ . '/../views/compte.php';