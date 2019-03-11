<!DOCTYPE html>
<html>
    <head>
        <title>Connexion à votre espace membre</title>
        <meta charset="utf-8" /> 
    </head>
    <body>
        
        <h1>Connectez-vous à votre espace membre</h1>
            <form method="post" action="user_login.php">
                <label for="login">Pseudo:</label>
                <input type="text" name="login" value="" id="login" /><br />
                
                <label for="password1">Mot de passe:</label>
                <input type="password" name="password1" value="" id="password1" /><br />
                
                <label for="connexion">Connexion automatique</label>
                <input type="checkbox" name="checkbox" /><br />
                
                <input type="submit" value="Se connecter" />

            </form>
        

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['login']) AND isset($_POST['password1']))
{
        
    $req = $bdd->prepare('SELECT id, user, password FROM member_area WHERE user=?');
    $req->execute(array($_POST['login']));
    $result = $req->fetch();
    
    
    
    if(!$result)
    {
        echo ('Mauvais pseudo ou mot de passe.');        
        
    }else{
        $verifPassword= password_verify($_POST['password1'], $result['password']);
        
        if(!$verifPassword)
        {
          echo ('Mauvais identifiant ou mot de passe.');  
        }else
        {
            session_start();
            $_SESSION['id']= $result['id'];
            $_SESSION['user']= $result['user'];
            
            echo ('Vous êtes connecté');
        }
        
    }
    $req->closeCursor();
}

        

?>
        
<p> <a href="user_logout.php">Me déconnecter</a>
</p>
    </body>
</html>