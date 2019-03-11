<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Connexion Administrateur</title>
    </head>
    <body>
        <p>Veuillez entrer votre nom et mot de passe pour vous connecter:</p>
        <form action="dashboard.php" method="post">
            <p>
            <label for="user">Nom d'utilisateur:</label>
            <input type="text" name="user" /><br />
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" /><br />
            <input type="submit" value="Valider" />
            </p>
        </form>
        
    </body>
</html>