<?php
class recyclebin extends Controller
{
    public function show()
    {
        $recyclebinModel = $this->model("recyclebinModel");
        $config = $this->getConfig();
        $post = $recyclebinModel->post();
        $category = $this->getCategory();
        $this->view("recyclebin", [
            "post" => $post,
            "category" =>$category
        ]);
    }
}
