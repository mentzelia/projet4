<?php

require_once('model/UserManager.php');
require_once('model/PostManager.php');

function getCreatePostPage(){
    require('view/backend/createPostView.php');
}

function sendPost($title, $content){
    
    $postManager = new OpenClassRooms\Duboscq\Virginie\PostManager();
    
    $title = htmlspecialchars($title);
    $content = htmlspecialchars($content);
    
    $SendPost = $postManager->sendPost($title, $content);
    
    require('view/backend/dashboardView.php'); 
}

function getPostToModify(){
    
    $postManager = new OpenClassRooms\Duboscq\Virginie\PostManager(); 
    $posts = $postManager->getPostToModify(); 
    
    require('view/backend/listPostsView.php'); 
}

function modifyPost($postId)
{
    $postManager = new OpenClassRooms\Duboscq\Virginie\PostManager();

    $post = $postManager->getPost($postId);

    require('view/backend/modifyPostView.php');
}