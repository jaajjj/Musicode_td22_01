<?php include_once "templates/header.php" ?>

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

<?php include_once "templates/footer.php" ?>
