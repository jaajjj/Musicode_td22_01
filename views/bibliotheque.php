<?php if (isset($_SESSION['message_success'])): ?>
    <p class="notif-ajout-biblio"><?= htmlspecialchars($_SESSION['message_success']) ?></p>
    <?php unset($_SESSION['message_success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['message_error'])): ?>
    <p class="notif-ajout-biblio error"><?= htmlspecialchars($_SESSION['message_error']) ?></p>
    <?php unset($_SESSION['message_error']); ?>
<?php endif; ?>


<div class="biblio-page">
    <div class="biblio-container">
        <h1 class="biblio-title">Ma bibliothèque</h1>
        <p class="biblio-subtitle">Gérez vos morceaux préférés et ajustez vos notes.</p>
        <div class="biblio-list">
            <!-- affichage de la biblio -->
            <?php foreach ($musiques as $musique): ?>
            <div class="biblio-card">
                <div class="biblio-card-header">
                    <div class="biblio-card-title"><?= htmlspecialchars($musique['titre_mus']) ?></div>
                    <div class="biblio-card-meta"><?= htmlspecialchars($musique['auteur_mus']) ?> · Album : <?= htmlspecialchars($musique['album_mus']) ?></div>
                    <div class="biblio-card-duration">Durée : <?= htmlspecialchars(get_duree($musique['duree_mus'])) ?></div>
                </div>
            
                <div class="biblio-card-note-row">
                    <span class="biblio-card-note-label">Note</span>
                    <form method="GET" action="<?= getenv('BASE_URL').'note' ?>"> 
                        <input class="biblio-card-note-input" type="number" min="0" max="5" name="note" value="<?= htmlspecialchars($musique['note_mus']) ?>">
                        <input type="hidden" name="id_mus" value="<?= $musique['id_mus'] ?>">
                        <input type="hidden" name="id_user" value="<?= $_SESSION['user']['id_user'] ?>">
                        <button type="submit" class="biblio-card-btn biblio-card-btn-update">Mettre à jour</button>
                    </form>
                </div>
                
                <div class="biblio-card-actions-row">
                    <a href="<?= getenv('BASE_URL').'suppresion_musique?id_mus='.$musique['id_mus'].'&id_user='.$_SESSION['user']['id_user'] ?>" class="biblio-card-btn biblio-card-btn-remove">Retirer de ma bibliothèque</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>




