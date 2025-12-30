<?php
require_once __DIR__ . '/../models/modelMusique.php';

$musiques = get_musique_biblio($_SESSION['user']['id_user']);

require_once __DIR__ . '/../views/bibliotheque.php';


