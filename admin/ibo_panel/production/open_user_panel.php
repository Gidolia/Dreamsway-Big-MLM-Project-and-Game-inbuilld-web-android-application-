<?php
include "config.php";

session_start();
    
      $_SESSION[d_id]=$_GET[id];
      $_SESSION[d_password]=$_GET[password];
      $_SESSION[adm]="dsv";
      
      //echo $_SESSION[d_id];
	  //echo $_SESSION[d_password];
      
      echo "<script>location.href='http://dreamsway.in/ibo_panel/production/';</script>";
    




?>