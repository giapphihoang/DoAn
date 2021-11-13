<?php
class logout extends Controller
{
    public function show()
    {
        unset($_SESSION["user"]);
        $url = '';
        if (isset($_SERVER['HTTP_REFERER'])) {
            $url = $_SERVER['HTTP_REFERER'];
        } else {
            $url = $this->getConfig()->domain;
        }
        header("Location: $url");
    }
}
