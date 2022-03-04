<?php

// Récupérer les fonctions
require_once 'fonctions.php';

// Récupère tous les éditeurs
$types = getAllTypes();

// Récupérer les informations du logement sélectionné
$logement = getLogementById($_GET['id']);

// Vérifie si des données existent
if (!$logement) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edition d'un logement</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container p-5">
	<h1>Edition d'un logement </h1>
	<?php

// Si le bouton "Valider" est cliqué, on commence l'insertion en BDD
if (isset($_POST['submit'])) {
	// on convertit les possibles caractères spéciaux en entités html
	$POST['titre'] = htmlspecialchars($_POST['titre']);	
	$POST['adresse'] = htmlspecialchars($_POST['adresse']);	
	$POST['ville'] = htmlspecialchars($_POST['ville']);	
	$POST['type'] = htmlspecialchars($_POST['type']);	
	$POST['description'] = htmlspecialchars($_POST['description']);	

	// Contient les différents "name" des inputs du formulaire à vérifier (hormis l'image)
	$champs = ['titre', 'adresse', 'ville', 'cp', 'surface', 'prix', 'type'];

	// Vérifie que tous les champs sont bien remplis
//	if (isNotEmpty($_POST, $champs) && !empty($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
	if ( isNotEmpty($_POST, $champs) ) {
		// Vérifie le code postal
		if ( filter_var($_POST['cp'], FILTER_VALIDATE_INT, array("options"=>array("min_range"=>1, "max_range"=>99999))) && (strlen($_POST['cp']) == 5) ) {
			// Vérifie si la surface est bien bien numérique et dans un intervalle autorisé en bdd

			if ( filter_var($_POST['surface'], FILTER_VALIDATE_INT, array("options"=>array("min_range"=>0, "max_range"=>10000))) ) {


				if ( filter_var($_POST['prix'], FILTER_VALIDATE_INT, array("options"=>array("min_range"=>0, "max_range"=>100000000))) ) {
					
					
				$nom_photo = $_POST['old_photo'];
				//	echo($_POST['old_photo']);	


					// Si une image est envoyée, effectuer les vérifications nécessaires
					if (!empty($_FILES['photo']['name'])) {
	
						$extension = verifPicture($_FILES['photo']);
	
						// Si pas d'erreur dans la vérification de l'image, on upload
						if ($extension) {
							// Upload de l'image
							$nom_photo = uploadImage($_FILES['photo'], $_GET['id'], $extension);
						}
						else {
							echo '<div class="alert alert-danger" role="alert">Image invalide !</div>';
						}
					}
	
					// Mise à jour en base de données
					updateLogementById($_GET['id'], $_POST, $nom_photo);
	
					// Récupère les nouvelles valeurs du logement
					$logement = getLogementById($_GET['id']);
	
					echo '<div class="alert alert-success" role="alert">Magazine correctement mis à jour !</div>';
	
				}
				else {
					echo '<div class="alert alert-danger" role="alert">Le prix est invalide !  (entre 0 et 10 000 000 €)</div>';
				}	
			}
			else {
				echo '<div class="alert alert-danger" role="alert">La surface est invalide !  (entre 0 et 10 000 mètres carrés)</div>';
			}
		}	
		else {
			echo '<div class="alert alert-danger" role="alert">Le coded postal est invalide !  (entre 00001 et 99999)</div>';
		}
	}
	else {
		echo '<div class="alert alert-danger" role="alert">Tous les champs sauf description sont obligatoires !</div>';
	}
	
}

?>

	<form method="post" class="mt-5" enctype="multipart/form-data" novalidate>
		<div class="form-group">
			<label>Titre</label>
			<input type="text" class="form-control" name="titre" value="<?php echo $logement['titre'] ?>">
		</div>
		<div class="form-group">
			<label>Adresse</label>
			<input type="text" class="form-control" name="adresse"  value="<?php echo $logement['adresse'] ?>">
		</div>
		<div class="form-group">
			<label>Ville</label>
			<input type="text" class="form-control" name="ville"  value="<?php echo $logement['ville'] ?>">
		</div>
		<div class="form-group">
			<label>Code postal</label>
			<input type = "number" class="form-control" name="cp"  value="<?php echo $logement['cp'] ?>">
		</div>		
		<div class="form-group">
			<label>Surface</label>
			<div class="input-group">
				<input type="number" step="1"	 class="form-control" name="surface"  value="<?php echo $logement['surface'] ?>">
				<div class="input-group-append">
					<div class="input-group-text">m2</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label>Prix</label>
			<div class="input-group">
				<input type="number" step="10"	 class="form-control" name="prix"  value="<?php echo $logement['prix'] ?>">
				<div class="input-group-append">
					<div class="input-group-text">€</div>
				</div>
			</div>
		</div>		
		<div class="form-group">
			<label>Photo</label>
			<img src="images/<?php echo $logement['photo'] ?>" alt="<?php echo $logement['titre'] ?>" class="img-fluid">
			<input type="hidden" name="old_photo" value="<?php echo $logement['photo'] ?>">
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="photo"  value="<?php echo $logement['photo'] ?>">
				<label class="custom-file-label">Changer de photo</label>
			</div>
		</div>
		<div class="form-group">
			<label>Type</label>
			<select name="type" class="custom-select">
				<?php foreach ($types as $type): ?>
					<option value="<?php echo $type ?>" <?php if($type === $logement['type']) { echo 'selected'; } ?>><?php echo $type ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Description</label>
			<textarea name="description" rows="10" class="form-control" ><?php echo $logement['description'] ?>	</textarea>
		</div>
		<a href="index.php" class="btn btn-outline-secondary">Annuler</a>
		<input type="submit" class="btn btn-primary" name="submit" value="Valider">
	</form>
</div>
</body>
</html>
