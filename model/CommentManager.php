<?php

namespace OpenClassRooms\Duboscq\Virginie;
require_once("model/Manager.php"); 

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $req->execute(array($postId));

        return $req;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $req->execute(array($postId, $author, $comment));

        return $req;
    }
    
    public function updateModerationToWarned($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET moderation = 1 WHERE id = ?');
        $req->execute(array($commentId));
        
        return $req;
    }
    
    public function getWarnedComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, moderation FROM comments WHERE moderation = 1 ORDER BY comment_date DESC');

        return $req;
    }
    
    public function updateModerationToOK($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET moderation = 0 WHERE id = ?');
        $req->execute(array($commentId));
        
        return $req;
    }
    
    public function deleteSelectedComment($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        
        return $req;
    }

    
}