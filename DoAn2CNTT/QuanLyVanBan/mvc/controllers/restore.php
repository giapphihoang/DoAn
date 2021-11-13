<?php
class restore extends Controller
{
    public function show($id=0)
    {
        $id = (int) $id;
        if (isset($_SESSION['user'])) {
            $restoreModel = $this->model("restoreModel");
            $config = $this->getConfig();
            if ($restoreModel->checkRestore($id)) {
                $error = null;
                $error = $restoreModel->update($id);
            }
        }
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }
}
