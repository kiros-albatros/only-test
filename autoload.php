<?php

function autoload($className)
{
    if (file_exists('./Core/' . $className . '.php')) {
        require_once './Core/' . $className . '.php';
    }
}

spl_autoload_register('autoload');