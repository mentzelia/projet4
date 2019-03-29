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
            <a href="index.php?action=approveComment&id=<?= $dataComment['id'] ?>"><i class="fas fa-thumbs-up"></i></a>
            <a href="index.php?action=deleteComment&id=<?= $dataComment['id'] ?>"><i class="fas fa-trash-alt"></i></a>
        </p>
    </div>

<?php
}
$warnedComments->closeCursor();
?>

<p class="return">
    <a href="index.php?action=showDashboard">Retour</a>
</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>