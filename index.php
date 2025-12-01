<?php
require_once 'vendor/autoload.php';

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
    case 'catalogue':
        require 'views/catalogue.php';
        break;
    default:
        require 'views/home.php';
}
