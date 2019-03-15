<!DOCTYPE html>
<html>
<head>
    <title>Billet simple pour l'Alaska - Nouveau billet</title>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
    <h1>Modifiez un billet</h1>
    
    <?php
    while ($data = $posts->fetch())
    {
    ?>
    
    <form method="post" action="">
        <label for="title">Titre du billet:</label>
        <input type= "text" name="title" value="<?= htmlspecialchars($data['title']) ?>" /><br />
        
        <textarea name="content">
            <?= htmlspecialchars($data['content']) ?>
        </textarea><br />
        
        <input type="submit" value="Modifier" />
    </form>
    
    <p>
        <a href="view/backend/dashboardView.php">Retour</a>
    </p>
    
    <?php
    }
    $posts->closeCursor();
    ?>
   
</body>
</html>


    
