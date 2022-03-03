<?php

require 'FormConstraints.php';

/**
 * A Form Class Validator
 * 
 * @author guillaume RGD <devweb@guillaumerigourd.fr>
 * 
 */
class FormValidator extends FormConstraints
{
    /**
     * Datas From Method, $_GET or $_POST
     */
    public array $datas;

    /**
     * Add Constraints
     */
    public array $constraints;

    public function __construct(array $datas, array $constraints = null)
    {
        $this->datas = $datas;

        if ($constraints) {
            $this->constraints = $constraints;
        }
    }

    public function isValide()
    {
        foreach ($this->constraints as $key => $value) {
            if (array_key_exists($key, $this->datas)) {
                var_dump("La clée {$key} existe dans ", $this->datas);
            }
        }
    }

    public function isSubmit()
    {
        if (isset($this->datas) && !empty($this->datas)) {

            echo '<b>_Form is submited !_</b>';

            // $this->showDatas();

            # Add More logic ...
        }
    }

    /**
     * Test, Show Datas from Constructor
     */
    public function showDatas()
    {
        echo '<pre>';
        var_dump($this->datas);
        echo '</pre>';
    }
}
