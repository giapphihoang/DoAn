<?php
class statisticModel extends DB
{
    public function checkstatistic($idc=null)
    {
        if ($idc==null) {
            return false;
        }
        $query = 'SELECT statistic FROM `statistic` WHERE id="'.$idc.'"';
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result)>0) {
            return true;
        }
        return false;
    }
    public function statistic()
    {
        $sql = mysqli_query($this->con, 'SELECT date FROM `post` where delete_at IS NULL ORDER BY date LIMIT 1');
        $result = mysqli_fetch_assoc($sql);
        $old = strtotime($result['date']);
        $sql = mysqli_query($this->con, 'SELECT `date` FROM `post` where delete_at IS NULL ORDER by date DESC LIMIT 1');
        $result = mysqli_fetch_assoc($sql);
        $new = strtotime($result['date']);
        $arr = array();
        $oy = date("Y", $old);
        $om = (int) date("m", $old);
        $ny = date("Y", $new);
        $nm = (int) date("m", $new);
        for ($i=$ny; $i >= $oy; $i--) {
            $arr[$i] = array();
            $s = 12;
            $e = 1;
            if ($i==$ny) {
                $s = $nm;
            } elseif ($i==$oy) {
                $e = $om;
            }
            for ($j=$s; $j >= $e; $j--) {
                $sql = mysqli_query($this->con, 'SELECT COUNT(id) as total FROM `post` where delete_at IS NULL AND YEAR(date)="'.$i.'" AND MONTH(date)="'.$j.'"');
                $result = mysqli_fetch_assoc($sql);
                $arr[$i][$j] = $result['total'];
            }
        }
        return $arr;
    }
    public function getPost($year, $month)
    {
        $query = 'SELECT p.`id`, p.`title`, p.`code`, p.`description`, p.`content`, p.`date_of_signature`, p.`date`, p.`view`, c.category, u.name FROM `post` as p, user as u, category as c WHERE p.delete_at IS NULL AND p.category = c.id and p.user = u.user AND YEAR(date)="'.$year.'" AND MONTH(date)="'.$month.'" ORDER by id DESC';
        $sql = mysqli_query($this->con, $query);
        $post = array();
        if ($sql) {
            if (mysqli_num_rows($sql) >0) {
                while ($row = mysqli_fetch_array($sql)) {
                    $file = $this->getFiles($row['id']);
                    if (mysqli_num_rows($file)>0) {
                        while ($f = mysqli_fetch_array($file)) {
                            $row['file'][] = $f;
                        }
                    }
                    $post[] = $row;
                }
            }
        }
        return $post;
    }
    public function getFiles($id)
    {
        $sql = $this->query('SELECT f.* FROM `post_file` pf, `files` f WHERE f.idf = pf.idf AND pf.idp = '.$id);
        return $sql;
    }

    public function total($year, $month)
    {
        $query = 'SELECT count(id) as total FROM `post` WHERE delete_at IS NULL AND YEAR(date)="'.$year.'" AND MONTH(date)="'.$month.'"';
        $result = mysqli_query($this->con, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
}
