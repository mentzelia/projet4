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
    
    if (isset($login) AND isset($password2) AND isset($email) AND ($password1 == $password2)) 
        {
            $login = htmlspecialchars($login);
            $password1 = htmlspecialchars($password1);
            $email = htmlspecialchars($email);
            $result = $userManager->addUser($login, $password1, $email);
        if($result != 'erreur'){
            header('Location:index.php?result=created');
        }else{
            header('Location:index.php?result=error');
        }
	   }
}