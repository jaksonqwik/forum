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

    function get_user(){
        $res = mysqli_query($this->conn,"SELECT * FROM `user`");
        return mysqli_fetch_all($res);
    }

    function get_user_row(){
        $res = mysqli_query($this->conn,"SELECT * FROM `user`");
        return mysqli_fetch_row($res);
    }

    function get(){
        $res = mysqli_query($this->conn,"SELECT * FROM `question`");
        return mysqli_fetch_all($res);
    }

    function answer(){
        $res = mysqli_query($this->conn,"SELECT * FROM `answer`");
        return mysqli_fetch_row($res);
    }

    function close(){
        $this->conn->close();
    }
}
?>