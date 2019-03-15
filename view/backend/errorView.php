<?php $title = 'Gestion des erreurs';

ob_start(); 
?>

<h1>Gestion des erreurs</h1>

<p>
<?= 'Erreur : ' . $e->getMessage();
?>
</p>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>