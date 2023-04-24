<?php

class Controller
{
    public function model($model)
    {
        require_once 'Models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []){
        if(file_exists('Views/' . $view . '.php')){
            require_once 'Views/' . $view . '.php';
        } else {
            // View does not exist
            die('View does not exist');
        }
    }
}