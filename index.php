<?php
require_once 'vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$page = $_GET['page'] ?? 'home';

switch($page) {
    case 'inscription':
        require 'views/inscription.php';
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
    default:
        http_response_code(404);
        break;
}
