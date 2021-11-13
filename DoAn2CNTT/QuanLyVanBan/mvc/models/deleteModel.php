<?php
class deleteModel extends DB
{
    public function checkDelete(int $id)
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
    public function update(int $id)
    {
        $query = 'DELETE FROM `post` WHERE `post`.`id` = "'.$id.'"';
        $result = mysqli_query($this->con, $query);
        if ($result) {
            return 'success';
        } else {
            return "fail";
        }
    }
}
