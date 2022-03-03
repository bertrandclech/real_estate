<?php

// Require Autoload
require_once '.' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'autoload.php';

// Show category list
$category = new AdvertManager();



// Form validator
$FormValidator = new FormValidator($_POST, ['price' => '65']);

// $advertEntity = new AdvertEntity($FormValidator->datas);

var_dump($FormValidator->isValide());

if ($FormValidator->isSubmit() && $FormValidator->isValide()) {
    # More logic here ...
}



// Header
require_once './templates/header.php';
?>
<section>
    <h2>Ajouter une annonce</h2>

    <!-- Form add advert -->
    <div>
        <form action="" method="POST">
            <div>
                <label for="title">title : </label>
                <input type="text" name="title" placeholder="title" />
            </div>
            <div>
                <label for="description">description : </label>
                <input type="text" name="description" placeholder="description" />
            </div>
            <div>
                <label for="postcode">postcode : </label>
                <input type="text" name="postcode" placeholder="postcode" />
            </div>
            <div>
                <label for="city">city : </label>
                <input type="text" name="city" placeholder="city" />
            </div>
            <div>
                <label for="price">price : </label>
                <input type="text" name="price" placeholder="price" />
            </div>
            <div>
                <label for="reservation_message">reservation_message : </label>
                <input type="text" name="reservation_message" placeholder="reservation_message" />
            </div>
            <div>
                <label for="category">category : </label>
                <select name="category_id">
                    <option>-- Select category --</option>
                    <?php foreach ($category->showCategoryList() as $category) :  ?>
                        <option value="<?= $category['id_category'] ?>"><?= $category['value'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <button type="submit">Ajouter une annonce</button>
            </div>
        </form>
    </div>
</section>

<?php require_once './templates/footer.php' ?>