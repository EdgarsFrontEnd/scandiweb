<?php

class Controller
{

    function runAction($actionName)
    {
        $actionName = strtolower($actionName);
        $actionName = str_replace(' ', '', ucwords($actionName, ' ')); // to camelcase
        $actionName .= 'Action';
        if (method_exists($this, $actionName)) {
            $this->$actionName();
        } else {
            include 'views/page-not-found.php';
        }
    }
}
