<div class="container">
        <main>
            <section class="catalogue-header">
                <div>
                    <h1>Catalogue des musiques</h1>
                    <p>Découvrez les morceaux disponibles et ajoutez-les à votre bibliothèque.</p>
                </div>
                <?php if (!empty($_SESSION['isConnected'])): ?>
                    <a href="<?= getenv('BASE_URL') . 'nouvelleMusique' ?>" 
                        class="new-music-btn" 
                        title="Nouvelle musique">
                        <span style="font-size: 2em;">+</span> Nouvelle musique
                    </a>
                <?php endif; ?>

            </section>
            <div class="music-grid">
                <?php foreach ($catalogue as $musique): ?>
                    <article class="music-card">
                        <h3><?= htmlspecialchars($musique["titre_mus"])?></h3>
                        <p><?= htmlspecialchars($musique["auteur_mus"])?> - Album : <?= htmlspecialchars($musique["album_mus"])?></p>
                        <span class="duration">Durée : <?= htmlspecialchars(get_duree($musique["duree_mus"]))?></span>
                        <div class="card-actions">
                            <a href="<?= getenv('BASE_URL') . 'musics/' . $musique['id_mus'] ?>" class="details-link">Voir la fiche</a>
                            <?php if(!isset($_SESSION['isConnected']) || !$_SESSION['isConnected']):?>
                                <a href="<?= getenv('BASE_URL').'login'?>" class="connection-link">Connectez vous pour l'ajouter</a>
                            <?php elseif(!musique_existe_in_biblio($_SESSION['user']['id_user'], $musique['id_mus'])):?> 
                                <a href="<?= getenv('BASE_URL').'ajoutMusiqueBiblio?id_mus='.$musique['id_mus'].'&id_user='.$_SESSION['user']['id_user'];?>" class="bouton-ajouter-biblio">Ajouter</a>
                            <?php else:?>
                                <a class="already-in-biblio">Déjà dans la bibliothèque</a>
                            <?php endif;?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
