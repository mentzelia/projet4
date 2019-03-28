<?php $title = 'Billet simple pour l\'Alaska - '. $post['title']; ?>

<?php ob_start(); ?>

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

<h4>Commentaires</h4>

<?php
while ($comment = $comments->fetch())
{
?>
<div class="comments">
    <p class="authorDate"><strong><?= $comment['author'] ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p class="textComment"><?= nl2br($comment['comment']) ?></p>
    <a href="index.php?action=warningPost&id=<?= $comment['id'] ?>">Signaler ce commentaire</a>
</div>

<?php
}
$comments->closeCursor(); 
?>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div class="field">
        <label for="author">Auteur</label>
        <input type="text" id="author" name="author" />
    </div>
    <div class="field">
        <label for="comment">Commentaire</label>
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div class="field">
        <input class="formButton" type="submit" />
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
