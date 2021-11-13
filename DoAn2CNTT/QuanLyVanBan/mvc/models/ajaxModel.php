<?php
class ajaxModel extends DB
{
    public function upload()
    {
        $array = array();
        if (isset($_FILES['file'])) {
            foreach ($_FILES['file']['name'] as $key => $name) {
                $name = htmlspecialchars(substr($name, 0, 254));
                $source = $_FILES['file']['tmp_name'][$key];
                $path = "public/files/" . $name;
                move_uploaded_file($source, $path);
                $rs = $this->query('INSERT INTO `files` (`idf`, `name`, `size`, `type`, `link`) VALUES (NULL, "'.$name.'", "'.$_FILES['file']['size'][$key].'", "'.$_FILES['file']['type'][$key].'", "'.$path.'")');
                $array[] = $this->con->insert_id;
            }
        }
        $json = json_encode($array);
        $key = $_SESSION['secret'];
        $_SESSION[$key] = $json;
        return $json;
    }
}
