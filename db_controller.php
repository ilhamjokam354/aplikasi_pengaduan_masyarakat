<?php
class DB 
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db_name = "ukk_rpl_2021";
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = $this->koneksiDatabase();
    }

    public function koneksiDatabase()
    {
        $koneksi = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
        return $koneksi;
    }

    public function getAll($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $data[] = $row;
        }
        if(!empty($data))
        {
            return $data;
        }
    }

    public function getItem($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function rowCount($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        $count = mysqli_num_rows($result);
        return $count;
    }

    public function runSql($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
    }

}
