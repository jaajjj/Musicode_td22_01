<?php 
require_once 'modelBDD.php';
function get_biblio(){
    $pdo = get_bdd();
    $stmt = $pdo->prepare("SELECT * FROM BIBLIOTHEQUE");
    $stmt->execute();
    $biblio = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $biblio;
}
