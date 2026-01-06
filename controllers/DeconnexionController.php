<?php
session_destroy();
header("Refresh: 2; url=".getenv('BASE_URL')."musics");
echo "Vous avez été déconnecté avec succès. \nRedirection vers la page d'accueil...";
exit();
?>