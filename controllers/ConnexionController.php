<?php
require_once __DIR__ . '/../models/modelUtilisateur.php';

// Si c'est une requête GET, afficher simplement le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once __DIR__ . '/../views/login.php';
    exit();
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $mdp   = $_POST['password'];

    $user = verify_user($email, $mdp);

    if ($user) {
        $_SESSION['isConnected'] = true;

        $_SESSION['user'] = [
            'nomUser'   => $user['nom_user'],
            'id_user'   => $user['id_user'],
            'mail_user' => $user['mail_user']
        ];

        header('Location: ' . getenv('BASE_URL') . 'musics');
        exit();
    } else {
        $_SESSION['connexion_error'] = "Email ou mot de passe incorrect.";
        header('Location: ' . getenv('BASE_URL') . 'login');
        exit();
    }
} else {
    $_SESSION['connexion_error'] = "Veuillez remplir tous les champs.";
    header('Location: ' . getenv('BASE_URL') . 'login');
    exit();
}
