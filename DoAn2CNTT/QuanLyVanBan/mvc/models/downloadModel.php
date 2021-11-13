<?php
class downloadModel extends DB
{
    public function download($id)
    {
        $sql = $this->query('SELECT * FROM `files` WHERE `idf`= '.$id);
        $arr = mysqli_fetch_assoc($sql);
        return $arr;
    }
}
