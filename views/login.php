<div class="form-container">
    <main>
        <div class="form-box">
            <h2>Connexion</h2>

            <?php if (!empty($_SESSION['connexion_error'])): ?>
                <p class="error-message">
                    <?= htmlspecialchars($_SESSION['connexion_error']) ?>
                </p>
                <?php unset($_SESSION['connexion_error']); ?>
            <?php endif; ?>

            <form action="<?= getenv('BASE_URL').'traitementConnexion' ?>" method="post">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" class="btn">Se connecter</button>
            </form>

            <p class="login-link">
                Pas encore de compte ?
                <a href="<?= getenv('BASE_URL').'register' ?>">Créer un compte</a>
            </p>
        </div>
    </main>
</div>