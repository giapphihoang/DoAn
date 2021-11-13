<?php
class DB
{
    public $con;
    protected $servername = "localhost";
    protected $username = 'root';
    protected $password = '';
    protected $dbname = "quanlyvanban";

    public function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        $sldb = mysqli_select_db($this->con, $this->dbname);
        if (!$sldb) {
            echo "Không thể kết nối đến database";
            exit();
        }
        mysqli_query($this->con, "SET NAMES 'utf8'");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
    }
    public function query($query)
    {
        return mysqli_query($this->con, $query);
    }
    public function getFiles($id)
    {
        $sql = $this->query('SELECT f.* FROM `post_file` pf, `files` f WHERE f.idf = pf.idf AND pf.idp = '.$id);
        $arr = array();
        if ($sql) {
            while ($row = mysqli_fetch_array($sql)) {
                $arr[] = $row;
            }
        }
        return $arr;
    }
    public function getCategory()
    {
        $query = 'SELECT * FROM `category`';
        $sql = mysqli_query($this->con, $query);
        $arr = array();
        if ($sql) {
            while ($row = mysqli_fetch_array($sql)) {
                $arr[] = $row;
            }
        }
        return $arr;
    }
    public function getPost($query)
    {
        $sql = $this->query($query);
        $post = array();
        if ($sql) {
            if (mysqli_num_rows($sql) >0) {
                while ($row = mysqli_fetch_array($sql)) {
                    $file = $this->getFiles($row['id']);
                    if (count($file)>0) {
                        $row['file'] = $file;
                    }
                    $post[] = $row;
                }
            }
        }
        return $post;
    }
}
