<?php
class editModel extends DB
{
    public function checkEdit(int $id)
    {
        if ($id<1) {
            return false;
        }
        $query = 'SELECT id FROM `post` WHERE id="'.$id.'"';
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result)>0) {
            return true;
        }
        return false;
    }
    public function post(int $id)
    {
        $query = 'SELECT * FROM `post` WHERE id="'.$id.'"';
        $result = mysqli_query($this->con, $query);
        return $result;
    }
    public function getCategory()
    {
        $query = 'SELECT * FROM `category`';
        $sql = mysqli_query($this->con, $query);
        return $sql;
    }
    public function update(int $id)
    {
        if (isset($_POST['category']) && isset($_POST['title'])) {
            $form = $this->validateForm($_POST);
            if ($this->checkCategory($form['category'])) {
                if ($this->checkTitle($form['title'])) {
                    if (isset($form['delete_file']) && count($form['delete_file'])>0) {
                        foreach ($form['delete_file'] as $idf) {
                            $idf = (int) $idf;
                            $this->query('DELETE FROM `post_file` WHERE `idp`="'.$id.'" AND `idf`="'.$idf.'"');
                        }
                    }
                    $dateOfSign = ($form['date_of_signature']=="") ? 'NULL' : '"'.$form['date_of_signature'].'"';
                    $date = date("Y-m-d", time());
                    if ($form['attribute'] == 'hidden') {
                        $attribute = ', delete_at = "'.$date.'"';
                    } else {
                        $attribute = ', delete_at = NULL';
                    }
                    $query = 'UPDATE `post` SET `title` = "'.$form['title'].'", `code` = "'.$form['code'].'", `description` = "'.$form['description'].'", `content` = "'.$form['content'].'", `category` = "'.$form['category'].'", `date_of_signature` = '.$dateOfSign.$attribute.', `date` = "'.$date.'" WHERE `post`.`id` = "'.$id.'"';
                    $result = mysqli_query($this->con, $query);
                    if ($result) {
                        $secret = $form['secret'];
                        if (!empty($secret) && isset($_SESSION[$secret])) {
                            $json = json_decode($_SESSION[$secret]);
                            if (is_array($json)) {
                                foreach ($json as $value) {
                                    $q = 'INSERT INTO `post_file` VALUES ("'.$id.'", "'.$value.'")';
                                    $rs = $this->query($q);
                                }
                            }
                        }
                        return 'success';
                    } else {
                        return "fail";
                    }
                } else {
                    return "title";
                }
            } else {
                return "category";
            }
        }
    }
    public function validateForm($p=[])
    {
        $p['title'] = addslashes($p['title']);
        $p['code'] = isset($p['code']) ? addslashes($p['code']) : '';
        $p['description'] = isset($p['description']) ? addslashes($p['description']) : '';
        $p['content'] = isset($p['content']) ? addslashes($p['content']) : '';
        $p['date_of_signature'] = isset($p['date_of_signature']) ? addslashes($p['date_of_signature']) : '';
        $p['secret'] = isset($p['secret']) ? addslashes($p['secret']) : '';
        return $p;
    }
    public function checkTitle(string $title)
    {
        if ($title=="") {
            return false;
        } else {
            return true;
        }
    }
    public function checkCategory($id)
    {
        $query = 'SELECT id FROM `category` WHERE id="'.$id.'"';
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result)>0) {
            return true;
        }
        return false;
    }
    public function getFiles($id)
    {
        $sql = $this->query('SELECT f.* FROM `post_file` pf, `files` f WHERE f.idf = pf.idf AND pf.idp = '.$id);
        return $sql;
    }
}
