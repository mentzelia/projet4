<?php

namespace OpenClassRooms\Duboscq\Virginie;
require_once("model/Manager.php"); 

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    
    public function sendPost($title, $content)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $dataPost = $posts->execute(array($title, $content));

        return $dataPost;
        
        $req->closeCursor();  
        
    }
    
    public function sendModifiedPost($title, $content)
    {
        $db = $this->dbConnect();
        //$posts = $db->prepare('UPDATE posts SET title=?, content=?WHERE');
        $dataPost = $posts->execute(array($title, $content));

        return $dataPost;
        
        $req->closeCursor();  
        
    }
    
    public function deleteSelectedPost($postId)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('DELETE FROM posts WHERE id = ?');
        $deletedPost = $posts->execute(array($PostId));

        return $deletedPost;
        
        $req->closeCursor();
    }
    
   
}