<?php
class App
{
    protected $controller="home";
    protected $action="show";
    protected $params=[];

    public function __construct()
    {
        $arr = $this->UrlProcess();
        // Controller
        if (is_array($arr)) {
            if (file_exists("./mvc/controllers/".$arr[0].".php")) {
                $this->controller = $arr[0];
                unset($arr[0]);
            } else {
                $this->controller = "fnf";
            }
        }
        require_once "./mvc/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        // Params
        $this->params = $arr?array_values($arr):[];

        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    public function UrlProcess()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
