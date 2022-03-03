<?php

// Require Database
require_once './DataBase/DataBase.php';

class AdvertManager extends DataBase
{
    /** Table "advert" */
    protected string $advert = 'advert';

    /** Table "category" */
    protected string $category = 'category';

    /**
     * Show Article (Accueil)
     */
    public function showAllArticle()
    {
        return $this->getPDO()->query(
            "SELECT * FROM {$this->advert} 
                INNER JOIN {$this->category}
                    WHERE {$this->advert}.category_id = {$this->category}.id_category"
        )->fetchAll();
    }

    /**
     * Show Category List
     */
    public function showCategoryList()
    {
        return $this->getPDO()->query(
            "SELECT * FROM {$this->category}"
        )->fetchAll();
    }
}
