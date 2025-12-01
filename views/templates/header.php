<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicode - Catalogue des musiques</title>
    <link rel="stylesheet" href=<?= getenv('BASE_URL').'assets/css/style.css'?>>
</head>
<body>
    <header>
        <a href="<?= getenv('BASE_URL').'home'?>" class="logo">
            <span class="logo-icon"><img alt='logo-beau' src="<?= getenv('BASE_URL').'assets/img/logo.png' ?>"></span> Musicode
        </a>
        <nav>
            <a href="<?= $_ENV['BASE_URL'].'catalogue' ?>">Catalogue</a>
            <?php if (empty($_SESSION['isConnected'])): ?>
                <a href="<?= getenv('BASE_URL').'login' ?>">Connexion</a>
                <a href="<?= getenv('BASE_URL').'inscription' ?>">Inscription</a>
            <?php else: ?>
                <a href="<?= getenv('BASE_URL').'bibliotheque' ?>">Ma bibliotheque</a>
                <a href="<?= getenv('BASE_URL').'compte' ?>">Mon profil</a>
                <a class="deconexion_btn" href="<?= getenv('BASE_URL').'TraitementDeconnexion' ?>">Déconnexion</a>
            <?php endif; ?>

        </nav>
    </header>
