<?php $title = 'Billet simple pour l\'Alaska - Tableau de bord'; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur votre tableau de bord!</h1><br />
<h3>Que voulez-vous faire?</h3>

<p>
<a href="index.php?action=createNewPost.php">Ecrire un billet</a><br/>
<a href="">Modifier un billet</a><br/>
<a href="">Effacer un billet</a><br/>
<a href="">Modérer un commentaire</a><br/>
<a href="">Se déconnecter</a>
</p>
     


<?php $content = ob_get_clean(); ?>

<?php require('../backend/template.php'); ?>