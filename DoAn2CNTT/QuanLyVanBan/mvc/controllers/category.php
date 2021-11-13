<?php
class category extends Controller
{
    public function show($idc=null, $p=1)
    {
        $categoryModel = $this->model("categoryModel");
        $config = $this->getConfig();
        $name = $categoryModel->checkCategory($idc);
        if ($name) {
            $post = $categoryModel->post($idc);
            $this->view("category", [
                "id" => $idc,
                "name"=>$name,
                "post" => $post,
            ]);
        } else {
            $add = $categoryModel->addCategory();
            $edit = $categoryModel->editCategory();
            $delete = $categoryModel->deleteCategory();
            $categorys = $this->getCategory();
            $this->view("categorys", [
                "categorys" => $categorys,
                "add" => $add,
                "delete" => $delete,
                "edit" =>$edit
            ]);
        }
    }
}
