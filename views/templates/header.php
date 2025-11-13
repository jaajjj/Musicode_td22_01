<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicode - Catalogue des musiques</title>
    <link rel="stylesheet" href=<?= $_ENV['BASE_URL'].'assets/css/style.css'?>>
</head>
<body>
    <header>
        <a href="<?= $_ENV['BASE_URL'].'index.php?page=home'?>" class="logo">
            <span class="logo-icon"><img alt='logo-beau' src="<?= $_ENV['BASE_URL'].'assets/img/logo.png' ?>"></span> Musicode
        </a>
        <nav>
            <a href="<?= $_ENV['BASE_URL'].'index.php?page=catalogue' ?>">Catalogue</a>
            <a href="<?= $_ENV['BASE_URL'].'index.php?page=login' ?>">Connexion</a>
            <a href="<?= $_ENV['BASE_URL'].'index.php?page=inscription' ?>">Inscription</a>
        </nav>
    </header>
