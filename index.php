<?php

// Require Autoload
require_once '.' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'autoload.php';

$annonce = new AdvertManager();

// Header
require_once './templates/header.php';
?>

<section>

    <h2>Annonces</h2>

    <div>
        <?php foreach ($annonce->showAllArticle() as $annonce) : ?>
            <div class="box-annonce">
                <p>titre : <?= $annonce['title'] ?></p>
                <p>Catégorie : <?= $annonce['value'] ?></p>
                <p>description : <?= $annonce['description'] ?></p>
                <p>postcode : <?= $annonce['postcode'] ?></p>
                <p>city : <?= $annonce['city'] ?></p>
                <p>price : <?= $annonce['price'] ?></p>
                <p>reservation_message : <?= $annonce['reservation_message'] ?></p>
                <p>price : <?= $annonce['price'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once './templates/footer.php' ?>