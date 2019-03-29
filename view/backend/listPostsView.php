<?php $title = 'Billet simple pour l\'Alaska - Liste des billets'; ?>

<?php ob_start(); ?>

<h2>Quel billet souhaitez-vous modifier?</h2><br />

<?php
while ($data = $posts->fetch())
{
?>
    <div class="editActions">
        <p>
            "<?= $data['title'] ?>" publié le  <?= $data['creation_date_fr'] ?>
            
            <a href="index.php?action=modifyPost&id=<?= $data['id'] ?>"><i class="fas fa-edit"></i></a>
            
            
            <a href="index.php?action=deletePost&id=<?= $data['id'] ?>"><i class="fas fa-trash-alt"></i></a>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>

<p class="return">
    <a href="index.php?action=showDashboard">Retour</a>
</p>

     


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>