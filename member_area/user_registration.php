<!DOCTYPE html>
<html>
    <head>
        <title>Inscription au blog</title>
        <meta charset="utf-8" /> 
    </head>
    <body>
        
        <h1>Inscription</h1>
        <p>Vous souhaitez participer à mon aventure et commenter mes billets?<br/>Alors inscrivez-vous ci-dessous!</p>
        
        <form method="post" action="user_registration.php">
            <label for="login">Pseudo:</label>
            <input type="text" name="login" value="" id="login" /><br />

            <label for="password1">Mot de passe:</label>
            <input type="password" name="password1" value="" id="password1" /><br />

            <label for="password2">Retapez le mot de passe:</label>
            <input type="password" name="password2" value="" id="password2" /><br />

            <label for="email">Adresse email:</label>
            <input type="email" name="email" value="" id="email" /><br />

            <input type="submit" value="S'inscrire" />
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

        
        if (isset($_POST['login']) AND isset($_POST['password2']) AND isset($_POST['email']) AND ($_POST['password1'] == $_POST['password2'])) 
        {
            $_POST['login'] = htmlspecialchars($_POST['login']);
            $_POST['password1'] = htmlspecialchars($_POST['password1']);
            $_POST['email'] = htmlspecialchars($_POST['email']);
            
            $req = $bdd->prepare('SELECT user FROM member_area WHERE user=?' );
            $req->execute(array($_POST['login']));
            
            if ($donnees = $req->fetch())
            {
                echo ('Ce nom d\'utilisateur est déja pris');
            }else
            {
                if (preg_match("#^[a-zA-Z0-9]{3,}$#", $_POST['login']) AND preg_match("#^[a-zA-Z0-9!_]{5,}$#", $_POST['password1']) AND preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) 
                {

                    $pass_hash = password_hash($_POST['password1'], PASSWORD_DEFAULT);

                    $req = $bdd->prepare('INSERT INTO member_area (user, password, email, creation_date) VALUES(?, ?, ?, NOW())');

                    $req->execute(array($_POST['login'], $pass_hash, $_POST['email']));

                    header('Location:unser_login.php');
                }

                else
                {
                    $reponse = 'Veuillez remplir correctement tous les champs';
                    header('Location:user_registration.php?reponse=' . $reponse);
                } 
            }
            $req->closeCursor();
	   } 
                 
           
    ?>
        
    </body>
</html>
        