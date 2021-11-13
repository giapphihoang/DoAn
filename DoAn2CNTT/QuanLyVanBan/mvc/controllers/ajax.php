<?php
class ajax extends Controller
{
    public function show($act=null)
    {
        $ajaxModel = $this->model("ajaxModel");
        $config = $this->getConfig();
        switch ($act) {
            case 'upload':
                $view = $ajaxModel->upload();
                break;
            default:
                $view = "";
                break;
        }
        $this->view("ajax", ["view"=>$view]);
    }
}
