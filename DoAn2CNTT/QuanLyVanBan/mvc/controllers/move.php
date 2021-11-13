<?php
class move extends Controller
{
    public function show($id=0)
    {
        $id = (int) $id;
        if (isset($_SESSION['user'])) {
            $moveModel = $this->model("moveModel");
            $config = $this->getConfig();
            if ($moveModel->checkMove($id)) {
                $error = null;
                $error = $moveModel->update($id);
            }
        }
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }
}
