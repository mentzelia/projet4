<?php $title = 'Billet simple pour l\'Alaska - Tableau de bord'; ?>

<?php ob_start(); ?>

<h2>Bienvenue sur votre tableau de bord!</h2><br />

<div class="dashboard">
    <div class="actions">
        <h3>Que voulez-vous faire?</h3>
        <ul>
            <li><a href="index.php?action=createNewPost">Ecrire un billet</a></li>
            <li><a href="index.php?action=getPostToModify">Modifier ou supprimer un billet</a></li>
            <li><a href="index.php?action=log_out">Se déconnecter</a></li>
        </ul>
    </div>

    <?php
    while ($dataComment = $warnedComments->fetch())
    {
    ?>
        <div class="lastNews">
            <h3>Commentaires signalés</h3>
            <p>
                Commentaire écrit par <?= $dataComment['author'] ?>
                <em>le <?= $dataComment['comment_date_fr'] ?></em>
                <br />        
                <?= nl2br($dataComment['comment']) ?>
                <br />
                <a href="index.php?action=approveComment&id=<?= $dataComment['id'] ?>"><i class="fas fa-thumbs-up"></i></a>
                <a href="index.php?action=deleteComment&id=<?= $dataComment['id'] ?>"><i class="fas fa-trash-alt"></i></a>
            </p>
        </div>

    <?php
    }
    $warnedComments->closeCursor();
    ?>


     


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>