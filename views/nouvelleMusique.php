    <div class="detail-container">
        <a href="<?= getenv('BASE_URL') . 'home' ?>" class="back-link">
            ← Retour au catalogue
        </a>

        <?php if (!empty($successMessage)): ?>
            <p class="account-success"><?= htmlspecialchars($successMessage) ?></p>
        <?php endif; ?>

        <section class="new-music-form">
            <h1>Ajouter une musique</h1>
            <p class="form-subtitle">
                Complétez les informations ci-dessous pour publier un nouveau morceau dans le catalogue.
            </p>

            <form method="post">
                <!-- Titre -->
                <label for="titre">Titre *</label>
                <input type="text" id="titre" name="titre" required>

                <!-- Artiste -->
                <label for="artiste">Artiste *</label>
                <input type="text" id="artiste" name="artiste" required>

                <!-- Album -->
                <label for="album">Album</label>
                <input type="text" id="album" name="album" required>

                <!-- Durée -->
                <label for="duree_min">Durée *</label>
                <div class="duration-group">
                    <div class="duration-field">
                        <input type="number" id="duree_min" name="duree_min" min="0" required>
                        <span class="duration-label">Minutes</span>
                    </div>
                    <span class="duration-separator">:</span>
                    <div class="duration-field">
                        <input type="number" id="duree_sec" name="duree_sec" min="0" max="59" required>
                        <span class="duration-label">Secondes</span>
                    </div>
                </div>

                <button type="submit" class="save-music-btn">Enregistrer la musique</button>
            </form>
        </section>
    </div>
