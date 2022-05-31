<?php

/**
 * Base Controller
 * Loads the models and views
 */
class Controller
{
    // Load Model

    public function model($model)
    {
        // Require model file
        require_once '../models/' . $model . '.php';
        // Instatiate model
        return new $model();
    }

    // Load View
    public function view($view, $data = [])
    {
        // check for view file
        if (file_exists('../app/views/' . $view . '.php')) {
            # code...
            require_once '../app/views/' . $view . '.php';
        } else {
            // View does not exits
            die('View does not exits');
        }
    }
}
