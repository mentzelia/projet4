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