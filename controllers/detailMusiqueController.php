<?php
require_once __DIR__ . '/../models/modelMusique.php';
if (isset($_GET['idMusique'])){
    $id = $_GET['idMusique'];
    $musique = get_musique_by_id($id);
}
require_once __DIR__ .'/../views/detailMusique.php';

