<!DOCTYPE html>
<html>
<head>
    <title>Billet simple pour l'Alaska - Nouveau billet</title>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
    <h1>Ecrivez un nouveau billet</h1>
    
    <form method="post" action="index.php?action=sendPost">
        <label for="title">Titre du billet:</label>
        <input type= "text" name="title" value="" /><br />
        
        <textarea name="content"></textarea><br />
        
        <input type="submit" value="Publier" />
    </form>
   
</body>
</html>