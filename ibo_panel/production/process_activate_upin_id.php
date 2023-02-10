<?php
include "config.php";
include "../../admin/ibo_panel/production/u_rebirth_function.php";
include "../../admin/ibo_panel/production/u_function.php";
include "../../admin/ibo_panel/production/u_runner_rebirth_function.php";
include "../../admin/ibo_panel/production/u_silver_rebirth_function.php";
include "../../admin/ibo_panel/production/u_gold_rebirth_function.php";
//include "../../admin/ibo_panel/production/";
function isNumber($c) {
        return preg_match('/[0-9]/', $c);
    }
    
    $string=$_POST[a_d_id];
       
    $chars = '';
    $ssd_id = '';
    for ($index=0;$index<strlen($string);$index++) {
        if(isNumber($string[$index]))
        {
            $ssd_id .= $string[$index];
        }
        else {
            $chars .= $string[$index];}
        
    }
$a_d_id=$ssd_id;
//$a_d_id=5;
if(isset($_POST[confirm_upgrade]))
{
    $xmnlk="SELECT * FROM `withdrawal_wallet` WHERE `note`='Bronze Club Income' AND `activated_id`='$a_d_id'";
    $mnqp=$con->query($xmnlk);
    if($mnqp->num_rows==0)
    {
    /////////////////// substracting PIN
    $pin=$d_detail[u_pin_wallet]-1;
    if($pin>=0)
    {
    $up_que="UPDATE `distributor` SET `u_pin_wallet` = '$pin' WHERE `distributor`.`d_id` = $_SESSION[d_id];";
    $his_que="INSERT INTO `u_pin_wallet` (`upw_id`, `date`, `time`, `d_id`, `pin_qty`, `from_d_id`, `to_d_id`, `admin`, `type`, `note`, `req_no`, `pin_a_d_id`, `pin_used`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '1', '', 'admin', 'y', '-', 'used', '', '$a_d_id', 'y');";
    
    //$his_que="INSERT INTO `pin_wallet` (`pw_id`, `date`, `time`, `d_id`, `pin_qty`, `from_d_id`, `to_d_id`, `admin`, `type`, `note`, `req_no`, `pin_used`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '1', '', 'admin', 'n', '-', 'used', '', '$a_d_id');";
  $sql_uuu="UPDATE `distributor` SET `shoping_point` = '3000' WHERE `distributor`.`d_id` = '$a_d_id';";  
    
    /////////////////////
$lsql="SELECT d_id,s_id,u_status FROM `distributor` WHERE `d_id`='$a_d_id'";
 $que=$con->query($lsql);
 $fet=mysqli_fetch_assoc($que);
 
 if($fet[u_status]!="y")
 {
    if($con->query($up_que)==TRUE && $con->query($his_que)==TRUE && $con->query($sql_uuu)===TRUE)
    {
        for_finally_entering_bronze_id($a_d_id);
        echo "<script>alert('Successfull! This Account is Upgraded Successfully'); location.href='activate_id_u_pin.php';</script>";
    }
 }
 else{echo "<script>alert('This Account is Already Upgraded'); location.href='activate_id_u_pin.php';</script>";}
}else{echo "<script>alert('You Dont have upin'); location.href='activate_id_u_pin.php';</script>";}
}else{
    echo "<script>alert('Sucessfully Activated'); location.href='activate_id_pin.php';</script>";
}
}
 ?>