<?php
namespace backend\functions;
session_start();

class used{

        public static function session($val, $val2){
            if($val2){
                $_SESSION[$val] = $val2;
            }
            else{
                return $_SESSION[$val];
            }

     }
     public static function post($val){
            return $_POST["$val"];
     }
}