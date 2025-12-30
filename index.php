<?php
require_once 'vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$page = $_GET['page'] ?? 'home';
require_once 'views/templates/header.php';

switch($page) {
    case 'inscription':
         require_once __DIR__.'/controllers/traitement_Inscription.php';
        break;
    case 'login':
        require_once __DIR__.'/controllers/ConnexionController.php';
        break;
     case 'traitementConnexion':
        require_once __DIR__.'/controllers/ConnexionController.php';
        break;
    case 'home':
        require_once __DIR__. '/controllers/catalogueMusiqueController.php';
        break;
    case 'detailMusique':
        require_once __DIR__. '/controllers/detailMusiqueController.php';
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
require_once 'views/templates/footer.php';

