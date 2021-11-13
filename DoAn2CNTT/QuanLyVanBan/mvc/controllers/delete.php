<?php
class delete extends Controller
{
    public function show($id=0)
    {
        $id = (int) $id;
        if (isset($_SESSION['user'])) {
            $deleteModel = $this->model("deleteModel");
            $config = $this->getConfig();
            if ($deleteModel->checkDelete($id)) {
                $error = null;
                $error = $deleteModel->update($id);
            }
        }
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }
}
