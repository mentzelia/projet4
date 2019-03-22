<?php $title = 'Billet simple pour l\'Alaska - Deconnexion';

ob_start(); 
?>

<p>Vous êtes maintenant déconnecté.<br/>
    <a href="index.php?action=log_in">Me reconnecter</a>
</p>


<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>

