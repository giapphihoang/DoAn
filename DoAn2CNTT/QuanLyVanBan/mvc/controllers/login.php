<?php
class login extends Controller
{
    public function show()
    {
        if (isset($_SESSION['user'])) {
            $config = $this->getConfig();
            header("Location: $config->domain");
        } else {
            $loginModel = $this->model("loginModel");
            $checkLogin = $loginModel->login();
            $this->view("login", $checkLogin);
        }
    }
}
