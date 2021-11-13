<?php
class post extends Controller
{
    public function show()
    {
        if (isset($_SESSION['user'])) {
            $postModel = $this->model("postModel");
            $config = $this->getConfig();
            $error = null;
            if ($_SERVER['REQUEST_METHOD']=="POST") {
                $error = $postModel->post();
                if ($error=="success") {
                    $id = $postModel->getId();
                    $link = $config->domain.'/view/'.$id;
                    header("Location: $link");
                }
            }
            $category = $postModel->getCategory();
            $this->view("post", [
                "category" => $category,
                "error" => $error
            ]);
        } else {
            $this->view("login");
        }
    }
}
