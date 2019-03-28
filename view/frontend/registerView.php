<?php $title = 'Billet simple pour l\'Alaska - Inscription'; ?>

<?php ob_start(); ?>

<h2>Inscription</h2>
        
<form method="post" action="index.php?action=user_registration">
    
        <label for="login">Nom d'utilisateur:</label>
        <input type="text" name="login" value="" id="login" /><br/>


        <label for="password1">Mot de passe:</label>
        <input type="password" name="password1" value="" id="password1" /><br/>

        <label for="password2">Retapez le mot de passe:</label>
        <input type="password" name="password2" value="" id="password2" /><br/>
    
        <label for="email">Adresse email:</label>
        <input type="email" name="email" value="" id="email" /><br/>
  
        <input class="formButton" type="submit" value="S'inscrire" /><br/>
</form>

<p class="connect">
    <a href="index.php">Retour à la page d'accueil</a><br />
    <a href="index.php?action=log_in">Déjà inscrit?</a>
</p>
        


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
