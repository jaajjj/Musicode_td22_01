<?php 
include_once "templates/header.php";
include_once "models/modelCatalogue.php";
include_once "models/modelMusique.php";

$catalogue = get_all_musiques();
?>

    <div class="container">
        <main>
            <section class="catalogue-header">
                <h1>Catalogue des musiques</h1>
                <p>Découvrez les morceaux disponibles et ajoutez-les à votre bibliothèque.</p>
            </section>

            <div class="music-grid">
                <?php foreach ($catalogue as $musique): ?>
                    <article class="music-card">
                        <h3><?= $musique["titre_mus"]?></h3>
                        <p><?= $musique["auteur_mus"]?> - Album : <?= $musique["album_mus"]?></p>
                        <span class="duration">Durée : <?= get_duree($musique["duree_mus"])?></span>
                        <div class="card-actions">
                            <a href="#" class="details-link">Voir la fiche</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
<?php include_once "templates/footer.php" ?>