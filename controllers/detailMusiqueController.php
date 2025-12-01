<?php
include_once "models/modelMusique.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $musique = get_musique_by_id($id);
}

