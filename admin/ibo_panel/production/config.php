<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../../../database_connect.php";
session_start();

$ad_pass="SELECT * FROM `admin_password` WHERE `id`='1' AND `password`='$_SESSION[adminr]'";
$log=$con->query($ad_pass);
if($log->num_rows==0){

			  
			    echo "<script>location.href='login.php';</script>";
		  }
		  else
    
   
?>