<?php

// Require Database
require_once __DIR__ . '../../../DataBase/DataBase.php';

class AdvertManager extends DataBase
{
    public function show()
    {
        return $this->getPDO()->query('SELECT * FROM advert')->fetchAll();
    }
}
