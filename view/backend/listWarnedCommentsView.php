<?php $title = 'Billet simple pour l\'Alaska - Modération des commentaires'; ?>

<?php ob_start(); ?>
<h1>Commentaires signalés</h1>


<?php
while ($dataComment = $warnedComments->fetch())
{
?>
    <div class="news">
        <p>
            Commentaire écrit par <?= $dataComment['author'] ?>
            <em>le <?= $dataComment['comment_date_fr'] ?></em>
            <br />        
            <?= nl2br($dataComment['comment']) ?>
            <br />
            <em><a href="index.php?action=approveComment">Approuver le commentaire</a></em>
            <br />
            <em><a href="index.php?action=deleteComment">Supprimer le commentaire</a></em>
        </p>
    </div>

<?php
}
$warnedComments->closeCursor();
?>

<p>
    <a href="index.php?action=showDashboard">Retour</a>
</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>