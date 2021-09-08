<?php
namespace backend;
include "./connect.php";
include "./functions/used.php";
use backend\connect;
use backend\functions\used;
class functionType {
    const FEATURES = "features",
        TIMELINE = "timeline",
        CONTACT = "contact",
        USAGEAREAS = "usageareas";
}


class operations extends connect{
    public $ReturnData = array();
    public function __construct()
    {
        $this->ReturnData = [];
        switch (used::post("function_type")){
            case functionType::FEATURES:
                $this->features();
                break;
            case functionType::TIMELINE:
                $this->timeline();
                break;
            case functionType::CONTACT:
                $this->contact();
                break;
            case functionType::USAGEAREAS:
                $this->usageareas();
                break;
        }
    }
    private function  features(){
        $this->db();
        $query = "SELECT * FROM features WHERE isactive=1";
        $result = mysqli_query($this->conn,$query);
        while ($row = mysqli_fetch_array($result)){
            array_push($this->ReturnData,[
                "name" => $row[1],
                "image" => "$row[2]",
                "desc" => $row[3],
            ]);
            }
    }
    private function  contact(){
        $this->db();
        $query = "SELECT * FROM contact";
        $result = mysqli_query($this->conn,$query);
        while ($row = mysqli_fetch_array($result)){
            array_push($this->ReturnData,[
                "address" => $row[1],
                "mail" => $row[2],
                "phone" => $row[3],
            ]);
        }
    }
    private function timeline(){
        $this->db();
        $query = "SELECT * FROM timeline where active=1 order by id desc";
        $result = mysqli_query($this->conn,$query);
        while ($row = mysqli_fetch_array($result)){
            array_push($this->ReturnData,[
                "title" => $row[1],
                "text" => "$row[2]",
            ]);
        }
    }
    private function usageareas(){
        $this->db();
        $query = "SELECT * FROM usageareas WHERE isactive=1";
        $result = mysqli_query($this->conn,$query);
        while ($row = mysqli_fetch_array($result)){
            array_push($this->ReturnData,[
                "title" => $row[1],
                "text" => "$row[2]",
            ]);
        }
    }
}



$data = new operations();

echo json_encode($data->ReturnData);