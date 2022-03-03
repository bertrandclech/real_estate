<?php

/**
 * Class Form Contraints for Class "FormValidator.php"
 * 
 * @author guillaume RGD <devweb@guillaumerigourd.fr>
 * 
 */
class FormConstraints
{

    /** String length */
    static function controllLength(string $value, int $min, int $max): ?string
    {
        if (strlen($value) < $min || strlen($value) > $max) {
            $value = null;
        }
        return $value;
    }

    /** Is int */
    static function controllInt(mixed $value): ?int
    {
        if (!is_int($value)) {
            $value = null;
        }
        return $value;
    }
}
