<!DOCTYPE html>
<html>
<head>
    <title>Billet simple pour l'Alaska - Nouveau billet</title>
    <link href="public/css/normalize.css" />
    <link href="public/css/editPost.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy|Montserrat|Reenie+Beanie|Special+Elite" rel="stylesheet">
    
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
    <h2>Ecrivez un nouveau billet</h2>
    
    <form method="post" action="index.php?action=sendPost">
        <label for="title">Titre du billet:</label>
        <input type= "text" name="title" value="" />
        
        <textarea name="content"></textarea>
        
        <input type="submit" value="Publier" />
    </form>
    
    <p>
        <a href="index.php?action=showDashboard">Retour</a>
    </p>
   
</body>
</html>