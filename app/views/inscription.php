<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicode - Inscription</title>
    <link rel="stylesheet" href="public\css\style.css">
</head>
<body>
    <header>
        <a href="#" class="logo">
            <span class="logo-icon">
                <img src="logo.svg.png" alt="Logo Musicode">
            </span>
            Musicode
        </a>
        <nav>
            <a href="#">Catalogue</a>
            <a href="#">Connexion</a>
            <a href="#" class="active">Inscription</a>
        </nav>
    </header>

    <main class="form-container">
        <div class="form-box">
            <h2>Inscription</h2>
            <form>
                <label for="nom">Nom d’affichage</label>
                <input type="text" id="nom" name="nom">

                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email">

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password">

                <label for="confirm">Confirmer le mot de passe</label>
                <input type="password" id="confirm" name="confirm">

                <button type="submit" class="btn">Créer mon compte</button>

                <p class="login-link">Déjà inscrit ? <a href="#">Se connecter.</a></p>
            </form>
        </div>
    </main>

    <footer>
        © 2025 Musicode · IUT Laval – R3.01 Développement web 2025-2026.
    </footer>
</body>
</html>
