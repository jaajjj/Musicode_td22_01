<?php
require_once 'vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$page = $_GET['page'] ?? 'musics';
$idMusique = $_GET['idMusique'] ?? null;
require_once 'views/templates/header.php';

switch($page) {
    case 'register':
         require_once __DIR__.'/controllers/traitement_Inscription.php';
        break;
    case 'login':
        require_once __DIR__.'/controllers/ConnexionController.php';
        break;
     case 'traitementConnexion':
        require_once __DIR__.'/controllers/ConnexionController.php';
        break;
    case 'musics':
        if ($idMusique) {
            $_GET['id_mus'] = $idMusique;
            require_once __DIR__ . '/controllers/detailMusiqueController.php';
        } else {
            require_once __DIR__ . '/controllers/catalogueMusiqueController.php';
        }
        break;
    case 'musics/':
        require_once __DIR__. '/controllers/detailMusiqueController.php';
        break;
    case 'ajoutMusiqueBiblio':
        require_once __DIR__.'/controllers/ajoutMusiqueBiblioController.php';
        break;
    case 'note':
        require_once __DIR__.'/controllers/noteMusiqueController.php';
        break;
    case 'suppresion_musique':
        require_once __DIR__.'/controllers/suppresionMusiqueBiblioController.php';
        break;
    case 'account':
        require_once __DIR__. '/controllers/compteController.php';
        break;
    case 'library':
        require_once __DIR__.'/controllers/bibliothequeController.php';
        break;
    case 'nouvelleMusique':
        require 'controllers/nouvelleMusiqueController.php';
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

