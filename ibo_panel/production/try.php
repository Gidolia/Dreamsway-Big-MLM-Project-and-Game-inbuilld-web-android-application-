<?php

/////////////never run this file 
/*include "../../database_connect.php";
include "function.php";
$xs="SELECT * FROM `tables` ORDER BY `tables`.`srno` ASC";
$xc=$con->query($xs);
while($id=$xc->fetch_assoc())
{
   echo $id[id];
   $a_d_id=$id[id];
       /////////////////////
$lsql="SELECT d_id,s_id,a_status FROM `distributor` WHERE `d_id`='$a_d_id'";
 $que=$con->query($lsql);
 $fet=mysqli_fetch_assoc($que);
    
    $sql="UPDATE `distributor` SET `a_status` = 'y' WHERE `distributor`.`d_id` = '$a_d_id';";
    $sql .="UPDATE `distributor` SET `a_date` = '$date' WHERE `distributor`.`d_id` = '$a_d_id';";
    $sql .="UPDATE `distributor` SET `a_time` = '$time' WHERE `distributor`.`d_id` = '$a_d_id';";
    $sql .="UPDATE `distributor` SET `shoping_point` = '2000' WHERE `distributor`.`d_id` = '$a_d_id';";
 
 
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
        echo "Success";
    } else {
      echo "failed";
    }
 
 while ($con->next_result()) {;} 
   
   echo "<br>";
}*/
include "config.php";
$d_id="875456";
$name="Kailash Dhomne";
$password="12345@d";
$mobile="7869470415";
$message='Welcome '.$name.' You are sucessfully Register Your ID=DS'.$d_id.' and Pass='.$password.', Dreamsway Sure Pvt Ltd, www.dreamsway.in';
send_sms($mobile, $message, 'New Registration', $d_id);




