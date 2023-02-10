<?php
include "config.php";
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
if(isset($_POST[confirm_activate]))
{
    /////////////////// substracting PIN
    $pin=$d_detail[pin_wallet]-1;
    if($pin>=0)
    {
    $up_que="UPDATE `distributor` SET `pin_wallet` = '$pin' WHERE `distributor`.`d_id` = $_SESSION[d_id];";
    
    $his_que="INSERT INTO `pin_wallet` (`pw_id`, `date`, `time`, `d_id`, `pin_qty`, `from_d_id`, `to_d_id`, `admin`, `type`, `note`, `req_no`, `pin_used`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '1', '', 'admin', 'n', '-', 'used', '', '$a_d_id');";
    
    
    /////////////////////
$lsql="SELECT d_id,s_id,a_status FROM `distributor` WHERE `d_id`='$a_d_id'";
 $que=$con->query($lsql);
 $fet=mysqli_fetch_assoc($que);
 
 if($fet[a_status]=="n")
 {
    $con->query($up_que);
    $con->query($his_que);
    
    $sql="UPDATE `distributor` SET `a_status` = 'y' WHERE `distributor`.`d_id` = '$a_d_id';";
    $sql .="UPDATE `distributor` SET `a_date` = '$date' WHERE `distributor`.`d_id` = '$a_d_id';";
    $sql .="UPDATE `distributor` SET `a_time` = '$time' WHERE `distributor`.`d_id` = '$a_d_id';";
    $sql .="UPDATE `distributor` SET `shoping_point` = '1200' WHERE `distributor`.`d_id` = '$a_d_id';";
 
 
///////////////////////////level 1 200/-
 
 $lsql1="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet[s_id]'";
 $que1=$con->query($lsql1);
 $fet1=mysqli_fetch_assoc($que1);
 
    $withdrawal_wallet=$fet1[withdrawal_wallet]+200;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet1[d_id]', '$date', '$time', '+', '200', '$withdrawal_wallet', 'Level Income', 'level', '', '', '$a_d_id', '1');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet1[d_id]';";
    
    
 
 ///////////////////////////level 2 50/-
 
 $lsql2="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet1[s_id]'";
 $que2=$con->query($lsql2);
 $fet2=mysqli_fetch_assoc($que2);
 
 
    $withdrawal_wallet=$fet2[withdrawal_wallet]+50;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet2[d_id]', '$date', '$time', '+', '50', '$withdrawal_wallet', 'Level Income', 'level', '', '', '$a_d_id', '2');";;
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet2[d_id]';";
    
 
 ///////////////////////////level 3 20/-
 
 $lsql3="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet2[s_id]'";
 $que3=$con->query($lsql3);
 $fet3=mysqli_fetch_assoc($que3);
 
 
     $withdrawal_wallet=$fet3[withdrawal_wallet]+20;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet3[d_id]', '$date', '$time', '+', '20', '$withdrawal_wallet', 'Level Income', 'level', '', '', '$a_d_id', '3');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet3[d_id]';";
    
    
 
 
 ///////////////////////////level 4 10/-
 
 $lsql4="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet3[s_id]'";
 $que4=$con->query($lsql4);
 $fet4=mysqli_fetch_assoc($que4);
 
     $withdrawal_wallet=$fet4[withdrawal_wallet]+10;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet4[d_id]', '$date', '$time', '+', '10', '$withdrawal_wallet', 'Level Income', 'level', '', '', '$a_d_id', '4');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet4[d_id]';";
    
 
 ///////////////////////////level 5 20/-
 
 $lsql5="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet4[s_id]'";
 $que5=$con->query($lsql5);
 $fet5=mysqli_fetch_assoc($que5);
 
 
     $withdrawal_wallet=$fet5[withdrawal_wallet]+20;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet5[d_id]', '$date', '$time', '+', '20', '$withdrawal_wallet', 'Level Income', 'level', '', '', '$a_d_id', '5');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet5[d_id]';";
 
 ///////////////////////////level 6 60/-
 
 $lsql6="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet5[s_id]'";
 $que6=$con->query($lsql6);
 $fet6=mysqli_fetch_assoc($que6);
 
     $withdrawal_wallet=$fet6[withdrawal_wallet]+60;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet6[d_id]', '$date', '$time', '+', '60', '$withdrawal_wallet', 'Level Income', 'level', '', '', '$a_d_id', '6');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet6[d_id]';";
    insert_d_id($a_d_id);
    if ($con->multi_query($sql) === TRUE) {
        echo "<script>location.href='activate_id_pin.php?s=s';</script>";
    } else {
        $ef="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `app`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'activation id query', 'y');";
	                $con->query($ef);
     echo "<script>location.href='activate_id_pin.php?s=q_f';</script>";
    }
 }
 else{echo "<script>location.href='activate_id_pin.php?s=al_activated';</script>";}
}else{echo "<script>location.href='activate_id_pin.php?s=u_bal';</script>";}
}
 ?>