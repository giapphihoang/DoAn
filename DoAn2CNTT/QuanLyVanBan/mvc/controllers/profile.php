<?php
class profile extends Controller
{
    public function show()
    {
        if (isset($_SESSION["user"])) {
            $profileModel = $this->model("profileModel");
            if (isset($_POST)) {
                $update = $profileModel->updateProfile();
            }
            $data = $profileModel->getProfile();
            $this->view("profile", ["profile"=>$data,"update"=>$update]);
        } else {
            $this->view("login");
        }
    }
}
