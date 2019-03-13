<?php $title = 'Billet simple pour l\'Alaska - Tableau de bord'; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur votre tableau de bord!</h1>
        
        


<?php $content = ob_get_clean(); ?>

<?php require('../frontend/template.php'); ?>