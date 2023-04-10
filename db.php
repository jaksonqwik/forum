<?php
class Database{

    public $host = "localhost";
    public $namedb = "forum";
    public $username = "root";
    public $pass = "";
    public $conn; 

    function connect(){
        $this->conn = new mysqli($this->host, $this->username, $this->pass, $this->namedb);
    }

    function get_questions(){
        $sql = "SELECT * FROM `question`";
        $res = $this->conn->query($sql);
        return $res;
    }

    function get(){
        $res = mysqli_query($this->conn,"SELECT * FROM `question`");
        return mysqli_fetch_all($res);
    }

    function close(){
        $this->conn->close();
    }
}
?>