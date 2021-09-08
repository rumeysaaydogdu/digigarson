<?php
namespace backend;
session_start();
class connect
{
    private $host = "localhost";
    private $dbName = "dgsite_wp59";
    private $userName = "dgsite";
    private $password = 'FOj$qbBJc0XXdu4g8Cf#ArBrDTSQ30cw';
    public $conn;
    public function db()
    {
        $this->conn = mysqli_connect($this->host, $this->userName, $this->password, $this->dbName);
        mysqli_set_charset($this->conn,"utf8");
        if (mysqli_connect_error()) {
            json_encode(["status" => false]);
        }
    }
}

