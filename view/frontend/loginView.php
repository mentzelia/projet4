<?php $title = 'Billet simple pour l\'Alaska - Connexion'; ?>

<?php ob_start(); ?>

<h2>Connexion</h2>
        
<form method="post" action="index.php?action=admin_connexion">
    <label for="login">Nom d'utilisateur:</label>
    <input type="text" name="login" value="" id="login" /><br />

    <label for="password">Mot de passe:</label>
    <input type="password" name="password" value="" id="password" /><br />

    <input class="formButton" type="submit" value="Se connecter" />
</form>

<p class="connect">
    <a href="index.php">Retour à la page d'accueil</a><br/>
    <a href="index.php?action=register">S'inscrire</a>
</p>        


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
