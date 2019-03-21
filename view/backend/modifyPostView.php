<!DOCTYPE html>
<html>
<head>
    <title>Billet simple pour l'Alaska - Nouveau billet</title>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
    <h1>Modifiez un billet</h1>
    
    <form method="post" action="index.php?action=updatePost&id=<?= $_GET['id'] ?>">
        <label for="title">Titre du billet:</label>
        <input type= "text" name="title" value="<?= $post['title'] ?>" /><br />
        
        <textarea name="content">
            <?= $post['content'] ?>
        </textarea><br />
        
        <input type="submit" value="Modifier" />
    </form>
    
    <p>
        <a href="view/backend/dashboardView.php">Retour</a>
    </p>
   
</body>
</html>


    
