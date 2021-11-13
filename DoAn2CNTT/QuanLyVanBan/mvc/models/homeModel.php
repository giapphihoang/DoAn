<?php
class homeModel extends DB
{
    public function search()
    {
        $query = '';
        $post = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $query = 'SELECT p.id, p.date, p.title, p.description, c.category, u.name FROM `post` as p, user as u, category as c WHERE p.delete_at IS NULL AND p.user = u.user AND p.category = c.id';
            if ($_POST['category'] != 'all') {
                $query .= " AND c.id = '".addslashes($_POST['category'])."'";
            }
            if (!empty($_POST['ngaybatdau'])) {
                $query .= " AND p.date >= '".addslashes($_POST['ngaybatdau'])."'";
            }
            if (!empty($_POST['ngayketthuc'])) {
                $query .= " AND p.date <= '".addslashes($_POST['ngayketthuc'])."'";
            }
            if (!empty($_POST['ngayky'])) {
                $query .= " AND p.date_of_signature = '".addslashes($_POST['ngayky'])."'";
            }
            $query .= ' ORDER by id DESC';
        } else {
            $query = "SELECT p.id, p.date, p.title, p.description, c.category, u.name FROM `post` as p, user as u, category as c WHERE p.delete_at IS NULL AND p.user = u.user AND p.category = c.id ORDER by id DESC";
        }
        return $this->getPost($query);
    }
}
