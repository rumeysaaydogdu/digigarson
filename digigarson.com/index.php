<?php
@session_start();
@ob_start();
define("DATA", "data/");
define("SAYFA", "include/");
//define("DENEME", "deneme/");
    // include_once(DATA .  "head_1.php");
    include_once(DATA .  "head.php");
  if ($_GET && !empty($_GET["sayfa"])) {
    $sayfa = $_GET["sayfa"];
    $sayfalar = explode("-", $sayfa);
    /*  if (file_exists(SAYFA . $sayfalar[1] . ".php")) {
      include_once(SAYFA . $sayfalar[1] .'MetaTag'.".php");
    } else {
    include_once(SAYFA . 'homeMetaTag'.".php");
    }
    include_once(SAYFA . "heade_2.php");
    */
      include_once(DATA . "header.php");
    if (file_exists(SAYFA . $sayfalar[1] . ".php")) {
      include_once(SAYFA . $sayfalar[1] . ".php");
    } else {
      include_once(SAYFA . "home.php");
    }
  } else {
    include_once(DATA . "header.php");
    include_once(SAYFA . "home.php");
  }
    include_once(DATA . "footer.php");
     include_once(DATA .  "script.php");
  ?>

  