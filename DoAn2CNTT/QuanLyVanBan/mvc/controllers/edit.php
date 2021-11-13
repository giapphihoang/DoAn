<?php
class edit extends Controller
{
    public function show($id=0)
    {
        $id = (int) $id;
        if (isset($_SESSION['user'])) {
            $editModel = $this->model("editModel");
            $config = $this->getConfig();
            if (isset($_POST['id'])) {
                $url = $config->domain.'/edit/'.addslashes($_POST['id']);
                header("Location: $url");
            }
            if ($editModel->checkEdit($id)) {
                $error = null;
                if ($_SERVER['REQUEST_METHOD']=="POST") {
                    $error = $editModel->update($id);
                }
                $post = $editModel->post($id);
                $category = $editModel->getCategory();
                $files = $editModel->getFiles($id);
                $this->view("edit", [
                    "files" => $files,
                    "id" => $id,
                    "post" => $post,
                    "category" => $category,
                    "error" => $error
                ]);
            } else {
                $this->view("edits");
            }
        } else {
            $this->view("login");
        }
    }
}
