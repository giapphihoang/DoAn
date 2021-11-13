<?php
class home extends Controller
{
    public function show($by="all", $key=null, $current_page=1)
    {
        $config = $this->getConfig();
        $homeModel = $this->model("homeModel");
        $post = $homeModel->search();
        $categorys = $this->getCategory();
        $this->view("home", [
            "post" => $post,
            "categorys" => $categorys,
            "by" => $by,
            "key" => $key
        ]);
    }
}
