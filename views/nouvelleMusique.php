    <div class="detail-container">
        <a href="<?= getenv('BASE_URL') . 'catalogue' ?>" class="back-link">
            ← Retour au catalogue
        </a>

            <?php 

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupération des données du formulaire
                $titre = $_POST['titre'] ?? '';
                $artiste = $_POST['artiste'] ?? '';
                $album = $_POST['album'] ?? '';
                $duree_min = isset($_POST['duree_min']) ? (int)$_POST['duree_min'] : 0;
                $duree_sec = isset($_POST['duree_sec']) ? (int)$_POST['duree_sec'] : 0;

                // Calcul de la durée totale en secondes
                $duree_totale = ($duree_min * 60) + $duree_sec;

                if (empty($errors)) {
                    // Inclusion du modèle pour l'insertion en base de données
                    require_once __DIR__ . '/../models/modelMusique.php';

                    // Insertion de la nouvelle musique
                    $insertion_success = ajouter_musique($titre, $artiste, $album, $duree_totale);

                    if ($insertion_success) {
                        $successMessage = "Musique ajoutée avec succès.";
                    }
                }
            }
            $successMessage = isset($successMessage) ? $successMessage : '';
            if (!empty($successMessage)): ?>
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
                <input type="text" id="album" name="album" placeholder="Optionnel">

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
