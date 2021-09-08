<?php
include_once(SINIF . "DB.php");
$DB = new DB();
$ayarlar= $DB->fetch_data("settings","WHERE ID=?",array(1),"ORDER BY ID ASC",1);
if($ayarlar!=false){
    $site_title=$ayarlar[0] ["title"];
    $site_keyword=$ayarlar[0] ["keyword"];
    $site_explanation=$ayarlar[0] ["explanation"];
    $site_url=$ayarlar[0] ["url"];
}