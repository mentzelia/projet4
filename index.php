<?php
require('controller/frontend.php');

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
            if(isset($_POST['login']) && isset($_POST['password1']) && isset($_POST['email'])){
                if(!empty($_POST['login']) && !empty($_POST['password1']) && !empty($_POST['email'])) {
                    
                    if($_POST['password1'] == $_POST['password2']) {
                        
                        addUser($_POST['login'], $_POST['password1'], $_POST['password2'], $_POST['email']);
                    }  
                }
            }
        }
        
        elseif($_GET['action'] == 'log_in'){
            getLogInForm();
        }
        
        
        
        
    }
    else {
        listPosts();
    }
}
catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
    require('view/frontend/errorView.php');
}
