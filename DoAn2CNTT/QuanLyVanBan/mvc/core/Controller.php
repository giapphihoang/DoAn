<?php
require_once('function.php');
class Controller extends core
{
    public function model($model)
    {
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[])
    {
        $config = $this->getConfig();
        require_once "./mvc/views/".$view.".php";
    }
}
