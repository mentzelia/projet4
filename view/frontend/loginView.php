<?php $title = 'Billet simple pour l\'Alaska - Connexion'; ?>

<?php ob_start(); ?>

<h1>Connexion à l'administration</h1>
        
<form method="post" action="index.php?action=admin_connexion">
    <label for="login">Nom d'utilisateur:</label>
    <input type="text" name="login" value="" id="login" /><br />

    <label for="password">Mot de passe:</label>
    <input type="password" name="password" value="" id="password" /><br />

    <input type="submit" value="Se connecter" />
</form>

<p>
    <a href="index.php">Retour à la page d'accueil</a>
</p>        


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
