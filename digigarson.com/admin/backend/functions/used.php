<?php
namespace backend\functions;
session_start();

class used{

     public static function session($val, $val2){
            if($val2 !== ""){
                $_SESSION[$val] = $val2;
            }
            else{
               echo $_SESSION[$val];
            }
     }
     public static  function sessionCheck($val){
            if($_SESSION[$val]){
            }
            else{
                header("location:./login.php");
            }
     }
    public static  function sessionbackCheck($val){
        if($_SESSION[$val]){
            return true;
        }
        else{
            return false;
        }
    }
     public static function post($val){
            return $_POST["$val"];
     }
     public static function addimage($path, $val){
         $imageName = rand(0,9860);
         $image_parts = explode(";base64,", $val);
         $image_base64 = base64_decode($image_parts[1]);
         $file = dirname(__FILE__).''.$path.''.$imageName.'.png';
         $status = file_put_contents("$file", $image_base64);
         if($status){
             return "./assets/icon/features/".$imageName.".png";
         }
         else{
             return false;
         }
     }
}