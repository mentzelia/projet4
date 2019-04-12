<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listPosts()
{
    $postManager = new OpenClassRooms\Duboscq\Virginie\PostManager(); 
    $posts = $postManager->getPosts(); 

    require('view/frontend/listPostsView.php');
}

function post($postId)
{
    $postManager = new OpenClassRooms\Duboscq\Virginie\PostManager();
    $commentManager = new OpenClassRooms\Duboscq\Virginie\CommentManager();

    $post = $postManager->getPost($postId);
    $comments = $commentManager->getComments($postId);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new OpenClassRooms\Duboscq\Virginie\CommentManager();
    
    $postId = htmlspecialchars($postId);
    $author = htmlspecialchars($author);
    $comment = htmlspecialchars($comment);
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function GetRegisterForm()
{
    require('view/frontend/registerView.php');
}

function addUser($login, $password1, $password2, $email)
{
    $userManager = new OpenClassRooms\Duboscq\Virginie\UserManager();
    
    $login = htmlspecialchars($login);
    $password1 = htmlspecialchars($password1);
    $email = htmlspecialchars($email);
    $result = $userManager->addUser($login, $password1, $email);
    
    header('Location:index.php?action=log_in');
               
}

function GetLogInForm()
{
    require('view/frontend/loginView.php');
}

function verifyUserData($login, $password)
{
    $userManager = new OpenClassRooms\Duboscq\Virginie\UserManager();
    
    $data = $userManager->getUserData($login);
    
    $passwordOK = password_verify($password, $data['password']);
    
    if($login == $data['user'] AND $passwordOK){
        if($data['role'] == 1){
            session_start();
            $_SESSION['id']= $data['id'];
            $_SESSION['user']= $data['user'];
            
            header('Location:index.php?action=showDashboard');
            
        }else{
            echo 'Vous n\'êtes pas administrateur.';
        }
    }else{
        echo 'Mauvais identifiant ou mot de passe<br /><a href="index.php?action=log_in">Retour</a>'; 
    } 
} 

function changeStatusToWarned($commentId)
{
    $commentManager = new OpenClassRooms\Duboscq\Virginie\CommentManager();
    $updatedComment = $commentManager->updateModerationToWarned($commentId);
    
    header('Location: index.php');
    
    
    
}