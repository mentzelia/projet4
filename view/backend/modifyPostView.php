<!DOCTYPE html>
<html>
<head>
    <title>Billet simple pour l'Alaska - Modifier un billet</title>
    <link href="public/css/normalize.css" />
    <link href="public/css/editPost.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy|Montserrat|Reenie+Beanie|Special+Elite" rel="stylesheet">
    
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
    <h2>Modifier un billet</h2>
    
    <form method="post" action="index.php?action=updatePost&id=<?= $postId ?>">
        <label for="title">Titre du billet:</label>
        <input type= "text" name="title" value="<?= $post['title'] ?>" /><br />
        
        <textarea name="content">
            <?= $post['content'] ?>
        </textarea><br />
        
        <input type="submit" value="Modifier" />
    </form>
    
    <p>
        <a href="index.php?action=showDashboard">Retour</a>
    </p>
   
</body>
</html>


    
