<?php

require_once __DIR__."/../models/modelMusique.php";
$catalogue = get_all_musiques();
require_once __DIR__.'/../views/catalogue.php';

?>