<?php

require_once('bdd.php');

require_once('autoload.php');

$advertManager = new AdvertManager($bdd);

// Récupération des information d'une annonce
$advert = $advertManager->getAdvertById($_GET['id']);

//var_dump($advert);  

// Si l'annonce n'existe pas, redirection vers la liste des magazines
if (!$advert) {
    header('Location: index.php');
}

?>  
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Détails d'un logement</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container p-5">
	<h1><?php echo $advert['title'] ?></h1>

    <a href="index.php" class="btn btn-secondary mt-2">Retour à la liste</a>

	<div class="row mt-5">
 <!--       <div class="col-2">
            <img src="images/
            <?php
            //echo $advert->getPicture(); ?>" alt="<?php //echo $advert->getTitleAd() ?>" class="img-fluid">
        </div>
-->
        <div class="col-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Code postal</th>
                        <th>ville</th>
                        <th>Prix</th>
                        <th>Categorie</th>
                        <th>Réservation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $advert['title']; ?></td>
                        <td><?php echo $advert['description'];  ?></td>
                        <td><?php echo $advert['postcode']; ?></td> 
                        <td><?php echo $advert['city']; ?></td>
                        <td><?php echo $advert['price']; ?> €</td>
                        <td><?php echo $advert['category']; ?></td>
                        <td><?php echo $advert['reservation_message']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <?php

// Si le bouton "Valider" est cliqué, on commence l'insertion en BDD
if (isset($_POST['submit'])) {

//    var_dump($_POST);



    // Vérifie que le champ est bien rempli
    if ( isset($_POST['reservation_message']) && !empty($_POST['reservation_message']) ) 	{
        // on convertit les possibles caractères spéciaux en entités html
        $POST['reservation_message'] = htmlspecialchars($_POST['reservation_message']);	
            // On réserve
            $advertManager->book($_GET['id']);
    }
    else {
        echo '<div class="alert alert-danger" role="alert">Le champ réservation est vide !</div>';
    }   
}

?>

        <form action="" method="post">
            <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="form-group">
                <label>Message de réservation: </label>
                <textarea name="reservation_message" rows="10" class="form-control" placeholder="<?php echo $advert['reservation_message'] ?>"></textarea>
            </div>
            <a href="index.php" class="btn btn-outline-secondary">Annuler</a>
            <input type="submit" class="btn btn-primary" name="submit" value="Réserver">
        </form>
    </div>
</div>
</body>
</html>
