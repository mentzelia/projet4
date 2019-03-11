<?php 
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Deconnexion</title>
        <meta charset="utf-8" /> 
    </head>
    <body>
        
        <p>Vous êtes maintenant déconnecté.<br/>
        <a href="user_login.php">Me reconnecter</a>
        </p>
    </body>
</html>
