<?php $title = 'Billet simple pour l\'Alaska - Tableau de bord'; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur votre tableau de bord!</h1>

<p>
<a href="index.php?action=createNewPost">Ecrire un billet</a><br/>
<a href="">Modifier un billet</a><br/>
<a href="">Effacer un billet</a><br/>
<a href="">Modérer un commentaire</a><br/>
</p>

<p><a href="">Se déconnecter</a>
</p>
        
        


<?php $content = ob_get_clean(); ?>

<?php require('../frontend/template.php'); ?>