<?php
require_once __DIR__ .'/../models/modelUtilisateur.php';

$id_user = (int)$_SESSION['user']['id_user'];
$user = get_compte_user($id_user);

$affich_nom = $user['nom_user'];
$succes_mess = '';
$error_mess = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $affich_nom = $_POST['display_name'] ?? '';
    $nouv_mdp = $_POST['new_password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if ($affich_nom === '') {
        $error_mess = "Le nom d'affichage est obligatoire.";
    } elseif (($nouv_mdp !== '' || $confirm !== '') && $nouv_mdp !== $confirm) {
        $error_mess = "Les mots de passe ne correspondent pas.";
    } elseif ($nouv_mdp !== '' && strlen($nouv_mdp) < 6) {
        $error_mess = "Le mot de passe doit contenir au moins 6 caractères.";
    } else {
        if ($nouv_mdp === '' && $confirm === '') {
            $ok = update_compte_nom($id_user, $affich_nom);
        } else {
            $hashedPassword = password_hash($nouv_mdp, PASSWORD_DEFAULT);
            $ok = update_compte_nom_mdp($id_user, $affich_nom, $hashedPassword);
        }

        if ($ok) {
            $_SESSION['user']['nomUser'] = $affich_nom;
            $succes_mess = "Votre compte a bien été mis à jour :)";
        } else {
            $error_mess = "Une erreur est survenue lors de la mise à jour, ressayez :(";
        }
    }
}

require __DIR__ .'/../views/compte.php';