<?php
require_once __DIR__ . '/../models/CompteModel.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['isConnected']) || empty($_SESSION['user'])) {
    header('Location: ' . getenv('BASE_URL') . 'login');
    exit();
}

$idUser = (int) $_SESSION['user']['id_user'];
$user   = get_compte_user($idUser);

// valeurs par défaut POUR LA VUE
$displayName    = $user['nom_user'] ?? '';
$successMessage = '';
$errorMessage   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $displayName = trim($_POST['display_name'] ?? '');
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
            $successMessage = "Votre compte a bien été mis à jour.";
        } else {
            $errorMessage = "Une erreur est survenue lors de la mise à jour.";
        }
    }
}

require __DIR__ . '/../views/compte.php';