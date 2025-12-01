<?php 
require_once "controllers/detailMusiqueController.php";

?>

<main class="detail-container">
    <a href="<?= getenv('BASE_URL').'home' ?>" class="back-link">← Retour au catalogue</a>

    <div class="detail-card">
        <h1><?= htmlspecialchars($musique['titre_mus']) ?></h1>
        <p class="artist">Par <?= htmlspecialchars($musique['auteur_mus']) ?></p>
        <p class="album">Album : <?= htmlspecialchars($musique['album_mus']) ?></p>
        <p class="duration">Durée : <?= get_duree($musique['duree_mus']) ?></p>

        <button class="btn">Ajouter à ma bibliothèque</button>
    </div>
</main>

<?php include_once "templates/footer.php"; ?>