<?php

// Require Autoload
require_once '.' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'autoload.php';

// Show category list
$category = new AdvertManager();

// Header
require_once './templates/header.php';
?>
<section>
    <h2>Ajouter une annonce</h2>

    <!-- Form add advert -->
    <div>
        <form>
            <div>
                <input type="text" name="title" placeholder="title" />
            </div>
            <div>
                <input type="text" name="description" placeholder="description" />
            </div>
            <div>
                <input type="text" name="postcode" placeholder="postcode" />
            </div>
            <div>
                <input type="text" name="city" placeholder="city" />
            </div>
            <div>
                <input type="text" name="price" placeholder="price" />
            </div>
            <div>
                <input type="text" name="reservation_message" placeholder="reservation_message" />
            </div>
            <div>
                <select name="category">
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