<?php
class categoryModel extends DB
{
    public function checkCategory($idc=null)
    {
        if ($idc==null) {
            return false;
        }
        $query = 'SELECT category FROM `category` WHERE id="'.$idc.'"';
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result)>0) {
            $sql = mysqli_fetch_assoc($result);
            return $sql['category'];
        }
        return false;
    }
    public function post($idc)
    {
        $query = 'SELECT p.`id`, p.`title`, p.`code`, p.`description`, p.`content`, p.`date_of_signature`, p.`date`, p.`view`, c.category, u.name FROM `post` as p, user as u, category as c WHERE p.delete_at IS NULL AND p.user = u.user AND p.category = c.id AND p.category = "'.$idc.'" ORDER by id DESC';
        return $this->getPost($query);
    }
    public function addCategory()
    {
        if (!empty($_POST['name']) && isset($_SESSION['user'])) {
            $rs = 'Lỗi';
            $name = addslashes($_POST['name']);
            $query = "SELECT * FROM category WHERE category= '$name'";
            $sql = $this->query($query);
            if (mysqli_num_rows($sql)>0) {
                $rs = 'exist';
            } else {
                $query = "INSERT INTO category VALUES(NULL, '$name')";
                $sql = $this->query($query);
                if ($sql) {
                    $rs = "Đã thêm";
                    return $rs;
                }
            }
            return $rs;
        }
    }
    public function editCategory()
    {
        if (!empty($_POST['category']) && !empty($_POST['edit']) && !empty($_POST['id']) &&isset($_SESSION['user'])) {
            $rs = 'Lỗi';
            $id = (int) $_POST['id'];
            $name = addslashes($_POST['category']);
            $query = "UPDATE category SET category = '$name' WHERE id='$id'";
            $sql = $this->query($query);
            if ($sql) {
                $rs = 'Đã lưu thay đổi';
                return $rs;
            }
            return $rs;
        }
    }
    public function deleteCategory()
    {
        if (!empty($_POST['delete']) && !empty($_POST['id']) &&isset($_SESSION['user'])) {
            $rs = 'Lỗi';
            $id = (int) $_POST['id'];
            $name = addslashes($_POST['category']);
            $query = "SELECT * FROM post WHERE category='$id'";
            $sql = $this->query($query);
            if (mysqli_num_rows($sql)>0) {
                $rs = 'Chuyển bài viết sang loại văn bản khác trước khi xoá!';
                return $rs;
            } else {
                $query = "DELETE FROM category WHERE id='$id'";
                $sql = $this->query($query);
                if ($sql) {
                    $rs = 'Đã xoá';
                    return $rs;
                }
            }
            return $rs;
        }
    }
}
