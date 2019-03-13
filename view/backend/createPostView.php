<?php $title = 'Billet simple pour l\'Alaska - Nouveau billet'; ?>

<?php ob_start(); ?>

<h1>ëcrivez un nouveau billet</h1>


        
        


<?php $content = ob_get_clean(); ?>

<?php require('../frontend/template.php'); ?>