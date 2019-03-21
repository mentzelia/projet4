<?php

require_once('model/UserManager.php');
require_once('model/PostManager.php');

function getCreatePostPage(){
    require('view/backend/createPostView.php');
}

function sendPost($title, $content){
    
    $postManager = new OpenClassRooms\Duboscq\Virginie\PostManager();
    
    $title = htmlspecialchars($title);
    $content = $content;
    
    $sendPost = $postManager->sendPost($title, $content);
    
    require('view/backend/dashboardView.php'); 
}

function getPostToModify(){
    
    $postManager = new OpenClassRooms\Duboscq\Virginie\PostManager(); 
    $posts = $postManager->getPosts(); 
    
    require('view/backend/listPostsView.php'); 
}

function modifyPost($postId)
{
    $postManager = new OpenClassRooms\Duboscq\Virginie\PostManager();

    $post = $postManager->getPost($postId);

    require('view/backend/modifyPostView.php');
}

function sendModifiedPost($title, $content, $postId){
    $postManager = new OpenClassRooms\Duboscq\Virginie\PostManager();
    
    $title = htmlspecialchars($title);
    $content = htmlspecialchars($content);
    
    $sendModifiedPost = $postManager->sendModifiedPost($title, $content, $postId);
    
    require('view/backend/dashboardView.php');
    
}

function deletePost($postId)
{
    $postManager = new OpenClassRooms\Duboscq\Virginie\PostManager();
    $post = $postManager->deleteSelectedPost($postId);
    
    require('view/backend/dashboardView.php'); 

}

function listWarnedComments()
{
    $commentManager = new OpenClassRooms\Duboscq\Virginie\CommentManager();
    $warnedComments = $commentManager->getWarnedComments();
    
    require('view/backend/listWarnedCommentsView.php');
}

function changeStatusToOK($commentId)
{
    $commentManager = new OpenClassRooms\Duboscq\Virginie\CommentManager();
    $updatedWarnedComment = $commentManager->updateModerationToOK($commentId);
    
    require('view/backend/dashboardView.php'); 
}

function deleteWarnedComment($commentId)
{
    $commentManager = new OpenClassRooms\Duboscq\Virginie\CommentManager();
    $deletedWarnedComment = $commentManager->deleteSelectedComment($commentId);
    
    require('view/backend/dashboardView.php');
}

function logOutSession()
{
    session_start();


    $_SESSION = array();
    session_destroy();
    
    require('view/backend/logOutView.php');
}