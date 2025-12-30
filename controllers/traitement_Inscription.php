<?php 
require_once __DIR__ . '/../models/modelUtilisateur.php';

function motdepasse_invalide($mdp, $mdp2) {
    $err = [];
    if (strlen($mdp) < 8) $err[] = "Le mot de passe doit contenir au moins 8 caractères";
    if (!preg_match('/[a-z]/', $mdp)) $err[] = "Le mot de passe doit contenir au moins une minuscule";
    if (!preg_match('/[0-9]/', $mdp)) $err[] = "Le mot de passe doit contenir au moins un chiffre";
    if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $mdp)) $err[] = "Le mot de passe doit contenir au moins un caractère spécial (!@#$%^&*(),.?\":{}|<>)";
    if ($mdp !== $mdp2) $err[] = "Les mots de passe sont différents";
    return $err;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    $errors = motdepasse_invalide($password, $confirm);

    if (empty($errors)) {
       $inscription_success = inscription($nom, password_hash($password, PASSWORD_BCRYPT), $email);
        if ($inscription_success) {
            header('Location: ' . getenv('BASE_URL') . 'login');
            exit();
        } else {
            $errors[] = "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    }
}

require_once __DIR__.'/../views/inscription.php';

?>