<?php $title = 'Billet simple pour l\'Alaska - Liste des billets'; ?>

<?php ob_start(); ?>

<h1>Quel billet souhaitez-vous modifier?</h1><br />

<?php
while ($data = $posts->fetch())
{
?>
    <div>
        <p>
            "<?= $data['title'] ?>" publié le  <?= $data['creation_date_fr'] ?>
            
            <em><a href="index.php?action=modifyPost&id=<?= $data['id'] ?>">Modifier</a></em>
            
            <em><a href="index.php?action=deletePost&id=<?= $data['id'] ?>">Supprimer</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>

<p>
    <a href="index.php?action=showDashboard">Retour</a>
</p>

     


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>