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
    $xmnlk="SELECT * FROM `withdrawal_wallet` WHERE `note`='Level Income' AND `activated_id`='$a_d_id'";
    $mnqp=$con->query($xmnlk);
    if($mnqp->num_rows==0)
    {
    /////////////////// substracting PIN
    $pin=$d_detail[pin_3_wallet]-1;
    if($pin>=0)
    {
    $up_que="UPDATE `distributor` SET `pin_3_wallet` = '$pin' WHERE `distributor`.`d_id` = $_SESSION[d_id];";
    
   // $his_que="INSERT INTO `pin_wallet` (`pw_id`, `date`, `time`, `d_id`, `pin_qty`, `from_d_id`, `to_d_id`, `admin`, `type`, `note`, `req_no`, `pin_used`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '1', '', 'admin', 'n', '-', 'used', '', '$a_d_id');";
    //$his_que="INSERT INTO `pin_wallet_2600` (`pw_id`, `d_id`, `date`, `time`, `pin`, `a_pin`, `note`, `type`, `activated_id`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '1', '$pin', 'Activated ID', '+', '$a_d_id');";
    $his_que="INSERT INTO `pin_wallet_3600` (`pw_id`, `d_id`, `date`, `time`, `pin`, `a_pin`, `note`, `type`, `activated_id`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '1', '$pin', 'Activated ID', '+', '$a_d_id');";
    
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
    $sql .="UPDATE `distributor` SET `shoping_point` = '0' WHERE `distributor`.`d_id` = '$a_d_id';";
    $sql .="UPDATE `distributor` SET `activated_pin` = '3600' WHERE `distributor`.`d_id` = '$a_d_id';";
 
///////////////////////////level 1 600/-
 
 $lsql1="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet[s_id]'";
 $que1=$con->query($lsql1);
 $fet1=mysqli_fetch_assoc($que1);
 
    $withdrawal_wallet=$fet1[withdrawal_wallet]+600;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet1[d_id]', '$date', '$time', '+', '600', '$withdrawal_wallet', 'Level Income', 'level', '', '', '$a_d_id', '1');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet1[d_id]';";
    
    
 
 ///////////////////////////level 2 100/-
 
 $lsql2="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet1[s_id]'";
 $que2=$con->query($lsql2);
 $fet2=mysqli_fetch_assoc($que2);
 
 
    $withdrawal_wallet=$fet2[withdrawal_wallet]+100;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet2[d_id]', '$date', '$time', '+', '100', '$withdrawal_wallet', 'Level Income', 'level', '', '', '$a_d_id', '2');";;
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet2[d_id]';";
    
 
 ///////////////////////////level 3 40/-
 
 $lsql3="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet2[s_id]'";
 $que3=$con->query($lsql3);
 $fet3=mysqli_fetch_assoc($que3);
 
 
     $withdrawal_wallet=$fet3[withdrawal_wallet]+40;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet3[d_id]', '$date', '$time', '+', '40', '$withdrawal_wallet', 'Level Income', 'level', '', '', '$a_d_id', '3');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet3[d_id]';";
    
    
 
 
 ///////////////////////////level 4 30/-
 
 $lsql4="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet3[s_id]'";
 $que4=$con->query($lsql4);
 $fet4=mysqli_fetch_assoc($que4);
 
     $withdrawal_wallet=$fet4[withdrawal_wallet]+30;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet4[d_id]', '$date', '$time', '+', '30', '$withdrawal_wallet', 'Level Income', 'level', '', '', '$a_d_id', '4');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet4[d_id]';";
    
 
 ///////////////////////////level 5 40/-
 
 $lsql5="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet4[s_id]'";
 $que5=$con->query($lsql5);
 $fet5=mysqli_fetch_assoc($que5);
 
 
     $withdrawal_wallet=$fet5[withdrawal_wallet]+40;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet5[d_id]', '$date', '$time', '+', '40', '$withdrawal_wallet', 'Level Income', 'level', '', '', '$a_d_id', '5');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet5[d_id]';";
 
 ///////////////////////////level 6 80/-
 
 $lsql6="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet5[s_id]'";
 $que6=$con->query($lsql6);
 $fet6=mysqli_fetch_assoc($que6);
 
     $withdrawal_wallet=$fet6[withdrawal_wallet]+80;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet6[d_id]', '$date', '$time', '+', '80', '$withdrawal_wallet', 'Level Income', 'level', '', '', '$a_d_id', '6');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet6[d_id]';";
    insert_d_id($a_d_id);
    if ($con->multi_query($sql) === TRUE) {
        echo "<script>alert('Sucessfully Activated'); location.href='activate_id_pin3600.php';</script>";
    } else {
      echo "<script>alert('Failed! Plz Try Again'); location.href='activate_id_pin3600.php';</script>";
    }
 }
 else{echo "<script>alert('This Account is Already Activated'); location.href='activate_id_pin3600.php';</script>";}
}else{echo "<script>alert('You Dont have balance'); location.href='activate_id_pin3600.php';</script>";}
}else{
    echo "<script>alert('Sucessfully Activated'); location.href='activate_id_pin3600.php';</script>";
}
}
 ?>