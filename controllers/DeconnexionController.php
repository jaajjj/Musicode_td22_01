<?php
session_destroy();
// redirection après 2 secondes
header("Refresh: 2; url=" . $_ENV['BASE_URL'] . "home");
echo "Vous avez été déconnecté avec succès. \nRedirection vers la page d'accueil...";
exit();
?>

