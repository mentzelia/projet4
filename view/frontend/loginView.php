<?php $title = 'Billet simple pour l\'Alaska - Connexion'; ?>

<?php ob_start(); ?>

<h1>Connexion à l'administration</h1>
        
        <form method="post" action="index.php?action=dashboard">
            <label for="login">Nom d'utilisateur:</label>
            <input type="text" name="login" value="" id="login" /><br />

            <label for="password1">Mot de passe:</label>
            <input type="password" name="password1" value="" id="password1" /><br />

            <input type="submit" value="Se connecter" />
        </form>
        


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
