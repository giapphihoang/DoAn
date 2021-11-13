<?php
class install extends Controller
{
    public function show()
    {
        $installModel = $this->model("installModel");
        $installModel->install();
    }
}
