<?php

namespace OpenClassRooms\Duboscq\Virginie;
require_once("model/Manager.php"); 

class UserManager extends Manager
{
    public function addUser($login, $password1, $email)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT user FROM member_area WHERE user=?' );
            $req->execute(array($login));
            
            if ($donnees = $req->fetch())
            {
                echo ('Ce nom d\'utilisateur est déja pris');
                return 'erreur';
            }else
            {
                if (preg_match("#^[a-zA-Z0-9]{3,}$#", $login) AND preg_match("#^[a-zA-Z0-9!_]{5,}$#", $password1) AND preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) 
                {

                    $pass_hash = password_hash($password1, PASSWORD_DEFAULT);

                    $req = $bdd->prepare('INSERT INTO member_area (user, password, email, creation_date) VALUES(?, ?, ?, NOW())');

                    return $req->execute(array($login, $pass_hash, $email));
                }

                else
                {
                    return $error = 'Erreur';
                } 
            }
            $req->closeCursor(); 
    }
    
    public function verifyUserData($login, $password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT user, password, role FROM member_area WHERE user=?, password=?' );
            $req->execute(array($login, $password));
            
            if ($data = $req->fetch())
            {
                echo ('OK');
                return 'OK';
            }
            $req->closeCursor();
    }


}
