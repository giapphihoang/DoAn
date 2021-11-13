<?php
class recyclebinModel extends DB
{
    public function post()
    {
        $query = "SELECT p.id, p.date, p.title, p.description, c.category, u.name FROM `post` as p, user as u, category as c WHERE p.delete_at AND p.user = u.user AND p.category = c.id ORDER by p.delete_at DESC";
        return $this->getPost($query);
    }
}
