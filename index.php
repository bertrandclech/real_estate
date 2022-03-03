<?php

// Require Autoload
require_once '.' . DIRECTORY_SEPARATOR . 'src' .DIRECTORY_SEPARATOR . 'autoload.php';

$showArticle = new AdvertManager();


var_dump($showArticle->show());

// Header
require_once './templates/header.php';
?>

<h1>Page d'accueil</h1>

<?php 


?>

<?php require_once './templates/footer.php' ?>
