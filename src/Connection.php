<?php
namespace tuana8tmt\Curd;
class Connection{
    public $conn;
    function __construct($server, $username, $password, $database){
        $this->conn = mysqli_connect($server, $username, $password, $database);
    }
}