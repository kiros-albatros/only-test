<?php

function autoload($className)
{
    if (file_exists('./Controllers/' . $className . '.php')) {
        require_once './Controllers/' . $className . '.php';
    }
}

spl_autoload_register('autoload');