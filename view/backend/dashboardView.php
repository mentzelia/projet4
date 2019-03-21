<?php $title = 'Billet simple pour l\'Alaska - Tableau de bord'; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur votre tableau de bord!</h1><br />
<h3>Que voulez-vous faire?</h3>

<p>
<a href="index.php?action=createNewPost">Ecrire un billet</a><br/>
<a href="index.php?action=getPostToModify">Modifier ou supprimer un billet</a><br/>
<a href="index.php?action=manageComments">Modérer un commentaire</a><br/>
<a href="index.php?action=log_out">Se déconnecter</a>
</p>
     


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>