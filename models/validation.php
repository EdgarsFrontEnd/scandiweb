<?php

class Validation
{

    public function validateEmpty($input)
    {
        if (empty($input)) {
            $_SESSION['error'] = 'Please, submit required data';
        }
    }

    public function validateNumeric($input)
    {
        if (!is_numeric($input)) {
            $_SESSION['error'] = 'Please, provide the data of indicated type';
        }
    }
}
