<div class="account-page">
    <main>
        <section class="account-card">
            <h1>Mon compte</h1>

            <?php if (!empty($successMessage)): ?>
                <p class="account-success"><?= htmlspecialchars($successMessage) ?></p>
            <?php endif; ?>

            <?php if (!empty($errorMessage)): ?>
                <p class="account-error"><?= htmlspecialchars($errorMessage) ?></p>
            <?php endif; ?>

            <form action="<?= getenv('BASE_URL').'account' ?>" method="post">
                <label for="nom_affich">Nom d'affichage</label>
                <input type="text"  id="nom_affich" name="nom_affich" value="<?= htmlspecialchars($affich_nom) ?>" required>
                <div class="account-grid">
                    <div>
                        <label for="new_password">Nouveau mot de passe</label>
                        <input type="password" id="new_password" name="new_password" placeholder="Laissez vide pour conserver l'actuel">
                    </div>
                    <div>
                        <label for="confirm_password">Confirmation</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Répétez le mot de passe">
                    </div>
                </div>
                <p class="account-help">Laissez les champs mot de passe vides pour conserver l'actuel</p>
                <button type="submit" class="account-btn">Mettre à jour</button>
            </form>
        </section>
    </main>
</div>