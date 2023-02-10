<?php
/*include "../../database_connect.php";
include "function.php";

$lsql="SELECT * FROM `distributor` WHERE `global_status`='y'";
 $que=$con->query($lsql);
 while($fet=mysqli_fetch_assoc($que))
 {
     $amt=0;
     $ccccc="SELECT * FROM `withdrawal_wallet` WHERE `d_id`='$fet[d_id]' AND `note`='Global Income'";
     $mn=$con->query($ccccc);
     while($am=$mn->fetch_assoc()){$amt=$amt+$am[amount];}
     
     
     
     
    $wallet=$fet[withdrawal_wallet]-$amt;
    echo $wallet.", ".$amt.", ".$fet[d_id];
    $u_w="UPDATE `distributor` SET `withdrawal_wallet` = '$wallet' WHERE `distributor`.`d_id` = '$fet[d_id]';";
    $i_w="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet[d_id]', '$date', '$time', '-', '$amt', '$wallet', 'Old website Used payment Removed', '', '', '', '', '');";
    if ($con->query($u_w) === TRUE && $con->query($i_w) === TRUE) {
        echo "1";
        while ($con->next_result()) {;} 
    } else {
      echo "failed";
    }
 
 while ($con->next_result()) {;}
   
   echo "<br>";
   
 }
   */
   
   
   
   
   
   
