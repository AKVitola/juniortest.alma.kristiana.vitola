<?php
//Load the model and the view
class Controller
{
    protected function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        //Instantiate model
        return new $model();
    }

    protected function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View does not exist.");
        }
    }
}
