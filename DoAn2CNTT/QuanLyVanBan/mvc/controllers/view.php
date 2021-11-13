<?php
class view extends Controller{
    function show($id=0){
        $id = (int) $id;
        $viewModel = $this->model("viewModel");
        $post = $viewModel->post($id);
        $config = $this->getConfig();
        if ($post) {
            $files = $this->getFiles($id);
            $this->view("view", [
                "id" => $id,
                "post" => $post,
                "files" => $files
            ]);
        }
        else
            $this->view("404");
    }
}
?>