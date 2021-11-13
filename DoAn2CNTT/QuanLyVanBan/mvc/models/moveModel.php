<?php
class moveModel extends DB
{
    public function checkMove(int $id)
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
        $query = 'UPDATE `post` SET delete_at = "'.date("Y-m-d", time()).'" WHERE `post`.`id` = "'.$id.'"';
        $result = mysqli_query($this->con, $query);
        if ($result) {
            return 'success';
        } else {
            return "fail";
        }
    }
}
