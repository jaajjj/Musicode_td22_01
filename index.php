<?php
require_once 'vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$page = $_GET['page'] ?? 'home';

switch($page) {
    case 'inscription':
        
            require_once __DIR__ . '/views/templates/header.php';
            require_once __DIR__ . '/views/inscription.php';
            require_once __DIR__ . '/views/templates/footer.php';
        
        break;
    case 'login':
        require 'views/login.php';
        break;
     case 'traitementConnexion':
        require 'controllers/ConnexionController.php';
        break;
    case 'catalogue':
        require 'views/catalogue.php';
        break;
    case 'home':
        require 'views/home.php';
        break;
    case 'compte':
        require 'views/compte.php';
        break;
    case 'bibliotheque':
        require 'views/bibliotheque.php';
        break;
    case 'TraitementDeconnexion':
        require 'controllers/DeconnexionController.php';
        break;
    case 'inscription_traitement':
        require 'controllers/traitement_Inscription.php';
        break;
    default:
        http_response_code(404);
        break;
}
