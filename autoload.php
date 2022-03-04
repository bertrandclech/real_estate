<?php

// Autoload
spl_autoload_register(function ($className) {
    require_once '.' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Classes' . DIRECTORY_SEPARATOR . $className . '.php';
});
