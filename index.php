<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$page = $_GET['page'] ?? 'home';
require_once 'views/templates/header.php';

switch($page) {
    case 'inscription':
        require 'views/inscription.php';
        break;
    case 'login':
        require 'views/login.php';
        break;
    case 'catalogue':
        require 'views/catalogue.php';
        break;
    case 'home':
        require 'views/home.php';
        break;
    case 'detailMusique':
        require 'views/detailMusique.php';
        break;
    default:
        http_response_code(404);
        break;
}
require_once 'views/templates/footer.php';

