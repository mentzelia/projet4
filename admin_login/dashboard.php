<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Tableau de bord</title>
    </head>
    <body>
    
        <?php
    if (isset($_POST['password']) AND isset($_POST['user']) AND $_POST['user'] == 'Jean' AND $_POST['password'] ==  "Alaska")
    {
    ?>
        <h1>Bienvenue Jean!</h1>  
        
        <p>
        Cette page est à paramétrer pour le tableau de bord. 
        </p>
        
        <?php
    }
    else 
    {
    ?>
        <p>Nom d'utilisateur ou mot de passe incorrect</p>
        <a href="admin_register.php">Retour au formulaire de connexion</a> 
    
    <?php
    }
    ?>
    
        
    </body>
</html>