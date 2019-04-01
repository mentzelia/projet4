<?php
session_start();

require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif($_GET['action'] == 'register') {
            getRegisterForm();
        }
        
        elseif($_GET['action'] == 'user_registration') {
            if(isset($_POST['login']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['email'])){
                if(!empty($_POST['login']) && !empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['email'])) {
                    
                    if($_POST['password1'] == $_POST['password2']) {
                        
                        addUser($_POST['login'], $_POST['password1'], $_POST['password1'], $_POST['email']);
 
                    }
                }  
            }  
        }
        
        elseif($_GET['action'] == 'log_in'){
            if(!empty($_SESSION['user']))
            {
                listWarnedComments();
                
            }else{
                getLogInForm();
            }
            
        }
        
        elseif($_GET['action'] == 'admin_connexion'){
            if(isset($_POST['login']) AND isset($_POST['password'])){
                
                if(!empty($_POST['login']) AND !empty($_POST['password'])){
                    
                    verifyUserData($_POST['login'], $_POST['password']);
                    
                }
            }
        }
        
        elseif($_GET['action'] == 'showDashboard'){
            if(isset($_SESSION['id']) AND isset($_SESSION['user'])){
                
                if(!empty($_SESSION['id']) AND !empty($_SESSION['user'])){
                    
                    listWarnedComments();
                } 
            } 
        }
        
        elseif($_GET['action'] == 'createNewPost'){
            getCreatePostPage();
        }
        
        elseif($_GET['action'] == 'sendPost'){
            if(isset($_POST['title']) AND isset($_POST['content'])){
                
                if(!empty($_POST['title']) AND !empty($_POST['content'])){
                    
                    sendPost($_POST['title'], $_POST['content']);
                }
            }  
        }
        
        elseif($_GET['action'] == 'getPostToModify'){
            getPostToModify();
        }
        
        elseif($_GET['action'] == 'modifyPost'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $postId = $_GET['id'];
                modifyPost($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        
        }
        
        elseif($_GET['action'] == 'updatePost'){
            if(isset($_POST['title']) AND isset($_POST['content'])){
                
                if(!empty($_POST['title']) AND !empty($_POST['content'])){
                    
                    if (isset($_GET['id']) && $_GET['id'] > 0){
                        
                        sendModifiedPost($_POST['title'], $_POST['content'], $_GET['id']);
                    } 
                }
            } 
            
            
        }
        
        elseif($_GET['action'] == 'deletePost'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deletePost($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        elseif($_GET['action'] == 'warningPost'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                changeStatusToWarned($_GET['id']);
            }
        }
        
        
        elseif($_GET['action'] == 'approveComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                changeStatusToOK($_GET['id']);
            }
        }
        
        elseif($_GET['action'] == 'deleteComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteWarnedComment($_GET['id']);
            }
            
        }
        
        elseif($_GET['action'] == 'log_out'){
            logOutSession();
        }
        
        
        
        
    }
    else {
        listPosts();
    }
}
catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
    require('view/frontend/errorView.php');
    require('view/backend/errorView.php');
}
