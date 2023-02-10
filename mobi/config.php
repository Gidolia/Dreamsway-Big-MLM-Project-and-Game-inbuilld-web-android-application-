<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../database_connect.php";
session_start();
                //echo $_SESSION[d_id];
		     // echo $_SESSION[d_password];
    $que="SELECT * FROM `distributor` WHERE `d_id`='$_SESSION[d_id]' AND `password`='$_SESSION[d_password]'";
    $res=$con->query($que);
		  if ($res->num_rows != 1)
		  {
		     // echo $_SESSION[d_id];
		     // echo $_SESSION[d_password];
			   echo "<script>location.href='login';</script>";
		  }
		  else
			  include("function.php");
			  $d_detail=mysqli_fetch_assoc($res);
include "footer.php";
			  //echo $_SESSION[d_id];
?>