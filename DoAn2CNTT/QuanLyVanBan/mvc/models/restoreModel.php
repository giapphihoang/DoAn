<?php
class restoreModel extends DB
{
    public function checkRestore(int $id)
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
        $query = 'UPDATE `post` SET delete_at = NULL WHERE `post`.`id` = "'.$id.'"';
        $result = mysqli_query($this->con, $query);
        if ($result) {
            return 'success';
        } else {
            return "fail";
        }
    }
}
