<?php $title = 'Billet simple pour l\'Alaska - Tableau de bord'; ?>

<?php ob_start(); ?>

<h2>Bienvenue sur votre tableau de bord!</h2><br />
<h3>Que voulez-vous faire?</h3>

<div class="dashboard">
    <div class="actions">
        <p>
            <a href="index.php?action=createNewPost">Ecrire un billet</a><br/>
            <a href="index.php?action=getPostToModify">Modifier ou supprimer un billet</a><br/>
            <a href="index.php?action=manageComments">Modérer un commentaire</a><br/>
            <a href="index.php?action=log_out">Se déconnecter</a>
        </p>
    </div>
    
    <div class="lastNews">
        <p>TEST</p>
    </div>
</div>
     


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>