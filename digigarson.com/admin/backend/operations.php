<?php
namespace backend;
include "./connect.php";
include "./functions/used.php";
use backend\connect;
use backend\functions\used;
class functionType {
    const
    LOGIN = "login",
    TIMELINE = "timeline",
    ADD_TIMELINE = "add_timeline",
    DEL_TIMELINE = "del_timeline",
    EDIT_TIMELINE = "edit_timeline",
    FEATURES = "features",
    DEL_FEATURES = "del_features",
    EDIT_FEATURES = "edit_features",
    ADD_FEATURES = "add_features",
    USAGEAREAS = "usageareas",
    DEL_USAGEAREAS = "del_usage",
    EDIT_USAGEAREAS = "edit_usage",
    ADD_USAGEAREAS = "add_usage",
    GALLERY = "gallery",
    ADD_GALLERY = "add_gallery";
}

class operations extends connect{
    public $ReturnData = [];
    public function __construct()
    {
        $this->db();
        if(used::sessionbackCheck("user") == false){
            if(used::post("function_type") == functionType::LOGIN){
                    $this->login();
            }
        }
        else{
            switch (used::post("function_type")){
                case functionType::TIMELINE:
                    $this->timeline();
                    break;
                case functionType::ADD_TIMELINE:
                    $this->add_timeline();
                    break;
                case functionType::DEL_TIMELINE:
                    $this->del_timeline();
                    break;
                case functionType::EDIT_TIMELINE:
                    $this->edit_timeline();
                    break;
                case functionType::FEATURES:
                    $this->features();
                    break;
                case functionType::DEL_FEATURES:
                    $this->del_features();
                    break;
                case functionType::EDIT_FEATURES:
                    $this->edit_features();
                    break;
                case functionType::ADD_FEATURES:
                    $this->add_features();
                    break;
                case functionType::USAGEAREAS:
                    $this->usageareas();
                    break;
                case functionType::DEL_USAGEAREAS:
                    $this->del_usageareas();
                    break;
                case functionType::EDIT_USAGEAREAS:
                    $this->edit_usageareas();
                    break;
                case functionType::ADD_USAGEAREAS:
                    $this->add_usageareas();
                    break;
                case functionType::GALLERY:
                    $this->gallery();
                    break;
                case functionType::ADD_GALLERY:
                    $this->add_gallery();
                    break;
            }
        }
    }
    /*** Login php S ***/
    private function login(){
        $mail = used::post("email");
        $pass = used::post("pass");
        if($mail && $pass){
        $query = "SELECT * FROM authme WHERE email='$mail'";
        $sql = mysqli_query($this->conn, $query);
        if(mysqli_num_rows($sql)){
            $sql = mysqli_query($this->conn, "SELECT * FROM authme WHERE email='$mail' AND password='$pass'");
            if(mysqli_num_rows($sql)){
                $fetch = mysqli_fetch_assoc($sql);
               used::session("user","$mail");
               used::session("permission", $fetch[4]);
                $this->ReturnData = ["status" => "success", "name" => $fetch["name"]];
            }else {
                $this->ReturnData = ["status" => "error"];
            }
        }else {
            $this->ReturnData = [
                "status" => "error"
            ];
        }
    }else {
        $this->ReturnData = [
            "status" => "error"
        ];
    }
    }
    /*** Login php F ***/

    /*** corporate php S ***/
    private function timeline(){
        $query = "SELECT * FROM timeline";
        $result = mysqli_query($this->conn,$query);
        while ($row = mysqli_fetch_array($result)){
            array_push($this->ReturnData,[
                "id" => $row[0],
                "title" => $row[1],
                "text" => "$row[2]",
                "active" => $row[3],
            ]);
        }
    }
    private function add_timeline(){
        $title = used::post("title");
        $text = used::post("text");
        if($title && $text){
            $query = "INSERT INTO timeline (title, text) VALUES ('$title', '$text')";
            $result = mysqli_query($this->conn, $query);
        }
        $this->ReturnData = [
            "status" => $result
        ];
    }
    private function del_timeline(){
        $id = used::post("id");
        $active = used::post("active");
        if($id){
            if($active == 1)
                $query = "UPDATE timeline SET active=0 where id='$id'";
            else
                $query = "UPDATE timeline SET active=1 where id='$id'";
            $result = mysqli_query($this->conn, $query);
        }
    }
    private function  edit_timeline(){
        $title = used::post("title");
        $text = used::post("text");
        $id = used::post("id");
        if($id && $title && $text){
            $query = "UPDATE timeline SET title='$title',text='$text' WHERE id='$id'";
            $result = mysqli_query($this->conn, $query);
        }
        $this->ReturnData = [
        "status" => $result
        ];
    }
    /*** corporate php F ***/

    /*** features php S ***/
    private function features(){
        $query = "SELECT * FROM features";
        $result = mysqli_query($this->conn,$query);
        while ($row = mysqli_fetch_array($result)){
            array_push($this->ReturnData,[
                "id" => $row[0],
                "name" => $row[1],
                "image" => "$row[2]",
                "desc" => $row[3],
                "active" => $row[4]
            ]);
        }
    }
    private function del_features(){
        $id = used::post("id");
        $active = used::post("active");
        if($id){
            if($active == 1)
                $query = "UPDATE features SET isactive=0 where id='$id'";
            else
                $query = "UPDATE features SET isactive=1 where id='$id'";
                $result = mysqli_query($this->conn, $query);
                $this->ReturnData= [
                  "status"=> $result,
                    "sas" => "hi"
                ];
        }
    }
    private function  edit_features(){
        $name = used::post("name");
        $description = used::post("description");
        $id = used::post("id");
        if($id && $name && $description){
            $query = "UPDATE features SET name='$name',description='$description' WHERE id='$id'";
            $result = mysqli_query($this->conn, $query);
        }
        $this->ReturnData = [
            "status" => $result
        ];
    }
    private function add_features(){
        $name = used::post("name");
        $description = used::post("description");
        $image = used::post("image");
        $addimage = used::addimage($image);
        if($addimage != false){
            if($name && $description && $image){
                $query = "INSERT INTO features (name, image, description) VALUES ('$name', '$addimage', '$description')";
                $result = mysqli_query($this->conn, $query);
            }
            $this->ReturnData = [
                "status" => $result
            ];
        }else{
            $this->ReturnData = [
                "status" => "resim yüklenemedi"
            ];
        }


    }

    /*** features php F ***/

    /*** usageareas php S ***/
    private function usageareas(){
        $query = "SELECT * FROM usageareas";
        $result = mysqli_query($this->conn,$query);
        while ($row = mysqli_fetch_array($result)){
            array_push($this->ReturnData,[
                "id" => $row[0],
                "title" => $row[1],
                "text" => "$row[2]",
                "active" => $row[3],
            ]);
        }
    }
    private function del_usageareas(){
        $id = used::post("id");
        $active = used::post("active");
        if($id){
            if($active == 1)
                $query = "UPDATE usageareas SET isactive=0 where id='$id'";
            else
                $query = "UPDATE usageareas SET isactive=1 where id='$id'";
            $result = mysqli_query($this->conn, $query);
            $this->ReturnData= [
                "status"=> $result,
                "sas" => "hi"
            ];
        }
    }
    private function  edit_usageareas(){
        $title = used::post("title");
        $text = used::post("text");
        $id = used::post("id");
        if($id && $title && $text){
            $query = "UPDATE usageareas SET title='$title',text='$text' WHERE id='$id'";
            $result = mysqli_query($this->conn, $query);
        }
        $this->ReturnData = [
            "status" => $result
        ];
    }
    private function add_usageareas(){
        $title = used::post("title");
        $text = used::post("text");
            if($title && $text){
                $query = "INSERT INTO usageareas (title, text) VALUES ('$title', '$text')";
                $result = mysqli_query($this->conn, $query);
            }
            $this->ReturnData = [
                "status" => $result
            ];

    }
    /*** usageareas php F ***/
    

    /*** gallery php S ***/
    private function gallery(){
        $query = "SELECT * FROM gallery";
        $result = mysqli_query($this->conn,$query);
        while ($row = mysqli_fetch_array($result)){
            array_push($this->ReturnData,[
                "name" => $row[1],
                "path" => $row[2],
                "category" => $row[3]
            ]);
        }
    }
    private function add_gallery(){
        $name = used::post("name");
        $image = used::post("image");
        $category = used::post("category");
        $addimage = used::addimage($image);
        if($addimage != false){
            if($name && $category && $image){
                $query = "INSERT INTO gallery(name, path, category) VALUES ('$name', '$addimage', '$category')";
                $result = mysqli_query($this->conn, $query);
            }
            $this->ReturnData = [
                "status" => $result
            ];
        }else{
            $this->ReturnData = [
                "status" => "resim yuklenemedi"
            ];
        }
    }
    /*** gallery php F ***/
}

$data = new operations();

echo json_encode($data->ReturnData);