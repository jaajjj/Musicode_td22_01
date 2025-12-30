
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
                            <a href="<?= getenv('BASE_URL').'detailMusique?id='.$musique['id_mus'] ?>" class="details-link">Voir la fiche</a>
                            <?php if(!isset($_SESSION['isConnected']) || !$_SESSION['isConnected']):?>
                                <a href="<?= getenv('BASE_URL').'login'?>" class="connection-link">Connectez vous pour l'ajouter</a>
                            <?php else:?>
                                <a href="<?= getenv('BASE_URL').'ajoutMusiqueBiblio?id_mus='.$musique['id_mus'].'&id_user='.$_SESSION['user']['id_user'];?>" class="bouton-ajouter-biblio">Ajouter</a>
                            <?php endif;?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
