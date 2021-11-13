<?php
class loginModel extends DB
{
    public function login()
    {
        if (isset($_POST['user']) && isset($_POST['pass'])) {
            $user = addslashes($_POST['user']);
            $pass = md5($_POST['pass']);
            if ($result = mysqli_query($this->con, "SELECT user FROM `user` WHERE `user` = '". $user ."' AND `pass` = '". $pass . "'"));
            if (mysqli_num_rows($result)) {
                $_SESSION["user"] = $user;
                $url = addslashes($_POST['url']);
                header("Location: $url");
                return "success";
            } else {
                return "fail";
            }
        } else {
            return "none";
        }
    }
}
