<?php $title = 'Billet simple pour l\'Alaska - '. $post['title']; ?>

<?php ob_start(); ?>

<h1>Titre du billet</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>
        
<div class="news">
    <h3>
        <?= $post['title'] ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= nl2br($post['content']) ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= $comment['author'] ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br($comment['comment']) ?></p>
    <a href="index.php?action=warningPost&id=<?= $comment['id'] ?>">Signaler ce commentaire</a>
<?php
}
$comments->closeCursor(); 
?>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
