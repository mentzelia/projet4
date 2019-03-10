<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p>Je suis Jean Forteroche, écrivain de plusieurs best-sellers.
    Aujourd'hui, j'entame un voyage de plusieurs mois à la découverte de l'Alaska. J'ai envie de partager avec vous mes découvertes, mon émerveillement, mes joies, mes doutes à travers ce blog.<br/>Découvrez ci-dessous les derniers billets que j'ai posté:</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>