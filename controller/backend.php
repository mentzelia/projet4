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
    
    header('Location:index.php?action=showDashboard'); 
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
    
    header('Location:index.php?action=showDashboard'); 
    
}

function deletePost($postId)
{
    $postManager = new OpenClassRooms\Duboscq\Virginie\PostManager();
    $post = $postManager->deleteSelectedPost($postId);
    
    header('Location:index.php?action=showDashboard'); 

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
    
    header('Location:index.php?action=showDashboard'); 
}

function deleteWarnedComment($commentId)
{
    $commentManager = new OpenClassRooms\Duboscq\Virginie\CommentManager();
    $deletedWarnedComment = $commentManager->deleteSelectedComment($commentId);
    
    header('Location:index.php?action=showDashboard'); 
}

function logOutSession()
{
    session_start();


    $_SESSION = array();
    session_destroy();
    
    require('view/backend/logOutView.php');
}