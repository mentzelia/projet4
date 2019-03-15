<?php $title = 'Billet simple pour l\'Alaska - Liste des billets'; ?>

<?php ob_start(); ?>

<h1>Quel billet souhaitez-vous modifier?</h1><br />

<?php
while ($data = $posts->fetch())
{
?>
    <div>
        <p>
            "<?= htmlspecialchars($data['title']) ?>"
        
            <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Modifier</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>

     


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>