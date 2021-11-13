<?php
class postModel extends DB
{
    public function post()
    {
        if (isset($_POST['category']) && isset($_POST['title'])) {
            $form = $this->validateForm($_POST);
            if ($this->checkCategory($form['category'])) {
                if ($this->checkTitle($form['title'])) {
                    $dateOfSign = ($form['date_of_signature']=="") ? 'NULL' : '"'.$form['date_of_signature'].'"';
                    $query = 'insert into `post` (`id`, `title`, `code`, `description`, `content`, `category`, `date_of_signature`, `date`, `view`, `user`) VALUES (NULL,"'.$form['title'].'", "'.$form['code'].'", "'.$form['description'].'", "'.$form['content'].'", "'.$form['category'].'", '.$dateOfSign.',"'.date("Y-m-d", time()).'","0","'.$_SESSION['user'].'")';
                    $result = mysqli_query($this->con, $query);
                    $lastid = $this->con->insert_id;
                    if ($result) {
                        $secret = $form['secret'];
                        if (!empty($secret) && isset($_SESSION[$secret])) {
                            $json = json_decode($_SESSION[$secret]);
                            if (is_array($json)) {
                                foreach ($json as $value) {
                                    $q = 'INSERT INTO `post_file` VALUES ("'.$lastid.'", "'.$value.'")';
                                    $rs = $this->query($q);
                                }
                            }
                        }
                        return 'success';
                    } else {
                        return 'fail';
                    }
                } else {
                    return 'title';
                }
            } else {
                return 'category';
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
    public function getId()
    {
        $result = mysqli_query($this->con, 'SELECT id FROM post ORDER BY id DESC LIMIT 1');
        $row = mysqli_fetch_assoc($result);
        return $row['id'];
    }
}
