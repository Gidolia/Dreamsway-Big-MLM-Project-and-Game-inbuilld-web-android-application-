<?php
include "config.php";
/////////////////////////////function for finding bronze tree 1 and second id
function for_finding_level_1_income_to_distribute($d_id)
{
    global $con, $date, $time;
    $sqd_id="SELECT * FROM `distributor` WHERE `d_id`='$d_id'";
    $qued=$con->query($sqd_id);
    $dd=$qued->fetch_assoc();
    $temp=array();
    $sqd_id1="SELECT * FROM `distributor` WHERE `s_id`='$dd[s_id]' AND `u_status`='y'";
    $qued1=$con->query($sqd_id1);
    while($dd1=$qued1->fetch_assoc())
    {
        $scv11="SELECT * FROM `bronze_tree` WHERE `d_id`='$dd1[d_id]' AND `rebirth_id`='n'";
        $ques11=$con->query($scv11);
        $fdt11=$ques11->fetch_assoc();
        $temp[]=array($fdt11[bt_id],$dd1[d_id]);
    }
    array_multisort($temp);
  $dat=0;
        for($i=0;$i<count($temp);$i++) {
        
          for($j=0;$j<count($temp[$i]);$j++) {
             if($temp[$i][$j]==$d_id)
             {
                 if($i!=1)
                 {
                    $dat=1;
                 }
             }
            
          } 
    
        }
  return $dat;
}
/////////////////////////////////////////////function for runner tree first and second id
function for_finding_level_1_income_to_distribute_runner($d_id)
{
    global $con, $date, $time;
    $sqd_id="SELECT * FROM `distributor` WHERE `d_id`='$d_id'";
    $qued=$con->query($sqd_id);
    $dd=$qued->fetch_assoc();
    $temp=array();
    $sqd_id1="SELECT * FROM `distributor` WHERE `s_id`='$dd[s_id]' AND `u_status`='y'";
    $qued1=$con->query($sqd_id1);
    while($dd1=$qued1->fetch_assoc())
    {
        $scv11="SELECT * FROM `runner_tree` WHERE `d_id`='$dd1[d_id]' AND `rebirth_id`='n'";
        $ques11=$con->query($scv11);
        $fdt11=$ques11->fetch_assoc();
        $temp[]=array($fdt11[rt_id],$dd1[d_id]);
    }
    array_multisort($temp);
  $dat=0;
        for($i=0;$i<count($temp);$i++) {
        
          for($j=0;$j<count($temp[$i]);$j++) {
             if($temp[$i][$j]==$d_id)
             {
                 if($i!=1)
                 {
                    $dat=1;
                 }
             }
            
          } 
    
        }
  return $dat;
}

/////////////////////////////////////////////function for silver tree first and second id
function for_finding_level_1_income_to_distribute_silver($d_id)
{
    global $con, $date, $time;
    $sqd_id="SELECT * FROM `distributor` WHERE `d_id`='$d_id'";
    $qued=$con->query($sqd_id);
    $dd=$qued->fetch_assoc();
    $temp=array();
    $sqd_id1="SELECT * FROM `distributor` WHERE `s_id`='$dd[s_id]' AND `u_status`='y'";
    $qued1=$con->query($sqd_id1);
    while($dd1=$qued1->fetch_assoc())
    {
        $scv11="SELECT * FROM `silver_tree` WHERE `d_id`='$dd1[d_id]' AND `rebirth_id`='n'";
        $ques11=$con->query($scv11);
        $fdt11=$ques11->fetch_assoc();
        $temp[]=array($fdt11[st_id],$dd1[d_id]);
    }
    array_multisort($temp);
  $dat=0;
        for($i=0;$i<count($temp);$i++) {
        
          for($j=0;$j<count($temp[$i]);$j++) {
             if($temp[$i][$j]==$d_id)
             {
                 if($i!=1)
                 {
                    $dat=1;
                 }
             }
            
          } 
    
        }
  return $dat;
}



//echo for_finding_level_1_income_to_distribute(485293);






/////////////////////for distributing bronze
$sql="SELECT * FROM `upgrade_income_on_income` WHERE `status`='n' AND `club`='Bronze'";
$que=$con->query($sql);
while($fet=$que->fetch_assoc())
{
    //echo $fet[d_id]."a<br>";
    $sqd_id="SELECT * FROM `distributor` WHERE `d_id`='$fet[d_id]'";
    $qued=$con->query($sqd_id);
    $dd=$qued->fetch_assoc();
    //echo $dd[s_id]."b<br>";
    //////////////level 1
    $sqd_id1="SELECT * FROM `distributor` WHERE `d_id`='$dd[s_id]'";
    $qued1=$con->query($sqd_id1);
    $dd1=$qued1->fetch_assoc();
    if($dd1[u_status]=="y")
    {
    if(for_finding_level_1_income_to_distribute($fet[d_id])=='1')
    {
        $lv1amount=$fet[amount];
        $withdrawal_abal=$dd1[withdrawal_wallet]+$lv1amount;
        $income_history="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd1[d_id]', '$date', '$time', '+', '$lv1amount', '$withdrawal_abal', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '1', 'Upgrade Income On Income', '');";
        $update_income_w="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal' WHERE `distributor`.`d_id` = $dd1[d_id];";
        if($con->query($income_history)===TRUE && $con->query($update_income_w)===TRUE)
        {
            
        }
        else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 1');";
	        $con->query($fail);
        }
    }
    }
 /*   //////////////level 2
    $sqd_id2="SELECT * FROM `distributor` WHERE `d_id`='$dd1[s_id]'";
    $qued2=$con->query($sqd_id2);
    $dd2=$qued2->fetch_assoc();
    if($dd2[u_status]=="y")
    {
    $lv2amount=$fet[amount]*10/100;
    $withdrawal_abal2=$dd2[withdrawal_wallet]+$lv2amount;
    $income_history2="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd2[d_id]', '$date', '$time', '+', '$lv2amount', '$withdrawal_abal2', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '2', 'Upgrade Income On Income', '');";
    $update_income_w2="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal2' WHERE `distributor`.`d_id` = $dd2[d_id];";
    if($con->query($income_history2)===TRUE && $con->query($update_income_w2)===TRUE)
    { 
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 2');";
        $con->query($fail);
    }
    }
    //////////////level 3
    $sqd_id3="SELECT * FROM `distributor` WHERE `d_id`='$dd2[s_id]'";
    $qued3=$con->query($sqd_id3);
    $dd3=$qued3->fetch_assoc();
    if($dd3[u_status]=="y")
    {
    $lv3amount=$fet[amount]*10/100;
    $withdrawal_abal3=$dd3[withdrawal_wallet]+$lv3amount;
    $income_history3="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd3[d_id]', '$date', '$time', '+', '$lv3amount', '$withdrawal_abal3', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '3', 'Upgrade Income On Income', '');";
    $update_income_w3="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal3' WHERE `distributor`.`d_id` = $dd3[d_id];";
    if($con->query($income_history3)===TRUE && $con->query($update_income_w3)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 3');";
        $con->query($fail);
    }
    }
    //////////////level 4
    $sqd_id4="SELECT * FROM `distributor` WHERE `d_id`='$dd3[s_id]'";
    $qued4=$con->query($sqd_id4);
    $dd4=$qued4->fetch_assoc();
    if($dd4[u_status]=="y")
    {
    $lv4amount=$fet[amount]*10/100;
    $withdrawal_abal4=$dd4[withdrawal_wallet]+$lv4amount;
    $income_history4="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd4[d_id]', '$date', '$time', '+', '$lv4amount', '$withdrawal_abal4', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '4', 'Upgrade Income On Income', '');";
    $update_income_w4="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal4' WHERE `distributor`.`d_id` = $dd4[d_id];";
    if($con->query($income_history4)===TRUE && $con->query($update_income_w4)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 4');";
        $con->query($fail);
    }
    }
    //////////////level 5
    $sqd_id5="SELECT * FROM `distributor` WHERE `d_id`='$dd4[s_id]'";
    $qued5=$con->query($sqd_id5);
    $dd5=$qued5->fetch_assoc();
    if($dd5[u_status]=="y")
    {
    $lv5amount=$fet[amount]*10/100;
    $withdrawal_abal5=$dd5[withdrawal_wallet]+$lv5amount;
    $income_history5="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd5[d_id]', '$date', '$time', '+', '$lv5amount', '$withdrawal_abal5', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '5', 'Upgrade Income On Income', '');";
    $update_income_w5="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal5' WHERE `distributor`.`d_id` = $dd5[d_id];";
    if($con->query($income_history5)===TRUE && $con->query($update_income_w5)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 5');";
        $con->query($fail);
    }
    }
    //////////////level 6
    $sqd_id6="SELECT * FROM `distributor` WHERE `d_id`='$dd5[s_id]'";
    $qued6=$con->query($sqd_id6);
    $dd6=$qued6->fetch_assoc();
    if($dd6[u_status]=="y")
    {
    $lv6amount=$fet[amount]*20/100;
    $withdrawal_abal6=$dd6[withdrawal_wallet]+$lv6amount;
    $income_history6="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd6[d_id]', '$date', '$time', '+', '$lv6amount', '$withdrawal_abal6', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '6', 'Upgrade Income On Income', '');";
    $update_income_w6="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal6' WHERE `distributor`.`d_id` = $dd6[d_id];";
    if($con->query($income_history6)===TRUE && $con->query($update_income_w6)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 6');";
        $con->query($fail);
    }
    }*/
    echo $fet[uioi_id];
    $xxs="UPDATE `upgrade_income_on_income` SET `status` = 'y' WHERE `upgrade_income_on_income`.`uioi_id` = '$fet[uioi_id]';";
    if($con->query($xxs)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'update y to n in income on income');";
        $con->query($fail);
    }
}




/////////////////////for distributing Bronze Rebirth
$sql="SELECT * FROM `upgrade_income_on_income` WHERE `status`='n' AND `club`='Bronze Rebirth'";
$que=$con->query($sql);
while($fet=$que->fetch_assoc())
{
    //echo $fet[d_id]."a<br>";
    $sqd_id="SELECT * FROM `distributor` WHERE `d_id`='$fet[d_id]'";
    $qued=$con->query($sqd_id);
    $dd=$qued->fetch_assoc();
    //echo $dd[s_id]."b<br>";
    //////////////level 1
    $sqd_id1="SELECT * FROM `distributor` WHERE `d_id`='$dd[s_id]'";
    $qued1=$con->query($sqd_id1);
    $dd1=$qued1->fetch_assoc();
    if($dd1[u_status]=="y")
    {
    if(for_finding_level_1_income_to_distribute($fet[d_id])=='1')
    {
        $lv1amount=$fet[amount]*40/100;
        $withdrawal_abal=$dd1[withdrawal_wallet]+$lv1amount;
        $income_history="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd1[d_id]', '$date', '$time', '+', '$lv1amount', '$withdrawal_abal', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '1', 'Upgrade Income On Income', '');";
        $update_income_w="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal' WHERE `distributor`.`d_id` = $dd1[d_id];";
        if($con->query($income_history)===TRUE && $con->query($update_income_w)===TRUE)
        {
            
        }
        else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 1');";
	        $con->query($fail);
        }
    }
    }
   /* //////////////level 2
    $sqd_id2="SELECT * FROM `distributor` WHERE `d_id`='$dd1[s_id]'";
    $qued2=$con->query($sqd_id2);
    $dd2=$qued2->fetch_assoc();
    if($dd2[u_status]=="y")
    {
    $lv2amount=$fet[amount]*10/100;
    $withdrawal_abal2=$dd2[withdrawal_wallet]+$lv2amount;
    $income_history2="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd2[d_id]', '$date', '$time', '+', '$lv2amount', '$withdrawal_abal2', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '2', 'Upgrade Income On Income', '');";
    $update_income_w2="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal2' WHERE `distributor`.`d_id` = $dd2[d_id];";
    if($con->query($income_history2)===TRUE && $con->query($update_income_w2)===TRUE)
    { 
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 2');";
        $con->query($fail);
    }
    }
    //////////////level 3
    $sqd_id3="SELECT * FROM `distributor` WHERE `d_id`='$dd2[s_id]'";
    $qued3=$con->query($sqd_id3);
    $dd3=$qued3->fetch_assoc();
    if($dd3[u_status]=="y")
    {
    $lv3amount=$fet[amount]*10/100;
    $withdrawal_abal3=$dd3[withdrawal_wallet]+$lv3amount;
    $income_history3="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd3[d_id]', '$date', '$time', '+', '$lv3amount', '$withdrawal_abal3', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '3', 'Upgrade Income On Income', '');";
    $update_income_w3="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal3' WHERE `distributor`.`d_id` = $dd3[d_id];";
    if($con->query($income_history3)===TRUE && $con->query($update_income_w3)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 3');";
        $con->query($fail);
    }
    }
    //////////////level 4
    $sqd_id4="SELECT * FROM `distributor` WHERE `d_id`='$dd3[s_id]'";
    $qued4=$con->query($sqd_id4);
    $dd4=$qued4->fetch_assoc();
    if($dd4[u_status]=="y")
    {
    $lv4amount=$fet[amount]*10/100;
    $withdrawal_abal4=$dd4[withdrawal_wallet]+$lv4amount;
    $income_history4="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd4[d_id]', '$date', '$time', '+', '$lv4amount', '$withdrawal_abal4', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '4', 'Upgrade Income On Income', '');";
    $update_income_w4="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal4' WHERE `distributor`.`d_id` = $dd4[d_id];";
    if($con->query($income_history4)===TRUE && $con->query($update_income_w4)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 4');";
        $con->query($fail);
    }
    }
    //////////////level 5
    $sqd_id5="SELECT * FROM `distributor` WHERE `d_id`='$dd4[s_id]'";
    $qued5=$con->query($sqd_id5);
    $dd5=$qued5->fetch_assoc();
    if($dd5[u_status]=="y")
    {
    $lv5amount=$fet[amount]*10/100;
    $withdrawal_abal5=$dd5[withdrawal_wallet]+$lv5amount;
    $income_history5="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd5[d_id]', '$date', '$time', '+', '$lv5amount', '$withdrawal_abal5', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '5', 'Upgrade Income On Income', '');";
    $update_income_w5="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal5' WHERE `distributor`.`d_id` = $dd5[d_id];";
    if($con->query($income_history5)===TRUE && $con->query($update_income_w5)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 5');";
        $con->query($fail);
    }
    }
    //////////////level 6
    $sqd_id6="SELECT * FROM `distributor` WHERE `d_id`='$dd5[s_id]'";
    $qued6=$con->query($sqd_id6);
    $dd6=$qued6->fetch_assoc();
    if($dd6[u_status]=="y")
    {
    $lv6amount=$fet[amount]*20/100;
    $withdrawal_abal6=$dd6[withdrawal_wallet]+$lv6amount;
    $income_history6="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd6[d_id]', '$date', '$time', '+', '$lv6amount', '$withdrawal_abal6', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '6', 'Upgrade Income On Income', '');";
    $update_income_w6="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal6' WHERE `distributor`.`d_id` = $dd6[d_id];";
    if($con->query($income_history6)===TRUE && $con->query($update_income_w6)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 6');";
        $con->query($fail);
    }
    }*/
    echo $fet[uioi_id];
    $xxs="UPDATE `upgrade_income_on_income` SET `status` = 'y' WHERE `upgrade_income_on_income`.`uioi_id` = '$fet[uioi_id]';";
    if($con->query($xxs)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'update y to n in income on income');";
        $con->query($fail);
    }
}



/////////////////////for distributing runner
$sql="SELECT * FROM `upgrade_income_on_income` WHERE `status`='n' AND `club`='runner'";
$que=$con->query($sql);
while($fet=$que->fetch_assoc())
{
    //echo $fet[d_id]."a<br>";
    $sqd_id="SELECT * FROM `distributor` WHERE `d_id`='$fet[d_id]'";
    $qued=$con->query($sqd_id);
    $dd=$qued->fetch_assoc();
    //echo $dd[s_id]."b<br>";
    //////////////level 1
    $sqd_id1="SELECT * FROM `distributor` WHERE `d_id`='$dd[s_id]'";
    $qued1=$con->query($sqd_id1);
    $dd1=$qued1->fetch_assoc();
    if($dd1[u_status]=="y")
    {
    if(for_finding_level_1_income_to_distribute_runner($fet[d_id])=='1')
    {
        $lv1amount=$fet[amount]*40/100;
        $withdrawal_abal=$dd1[withdrawal_wallet]+$lv1amount;
        $income_history="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd1[d_id]', '$date', '$time', '+', '$lv1amount', '$withdrawal_abal', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '1', 'Upgrade Income On Income', '');";
        $update_income_w="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal' WHERE `distributor`.`d_id` = $dd1[d_id];";
        if($con->query($income_history)===TRUE && $con->query($update_income_w)===TRUE)
        {
            
        }
        else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 1');";
	        $con->query($fail);
        }
    }
    }
/*    //////////////level 2
    $sqd_id2="SELECT * FROM `distributor` WHERE `d_id`='$dd1[s_id]'";
    $qued2=$con->query($sqd_id2);
    $dd2=$qued2->fetch_assoc();
    if($dd2[u_status]=="y")
    {
    $lv2amount=$fet[amount]*10/100;
    $withdrawal_abal2=$dd2[withdrawal_wallet]+$lv2amount;
    $income_history2="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd2[d_id]', '$date', '$time', '+', '$lv2amount', '$withdrawal_abal2', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '2', 'Upgrade Income On Income', '');";
    $update_income_w2="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal2' WHERE `distributor`.`d_id` = $dd2[d_id];";
    if($con->query($income_history2)===TRUE && $con->query($update_income_w2)===TRUE)
    { 
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 2');";
        $con->query($fail);
    }
    }
    //////////////level 3
    $sqd_id3="SELECT * FROM `distributor` WHERE `d_id`='$dd2[s_id]'";
    $qued3=$con->query($sqd_id3);
    $dd3=$qued3->fetch_assoc();
    if($dd3[u_status]=="y")
    {
    $lv3amount=$fet[amount]*10/100;
    $withdrawal_abal3=$dd3[withdrawal_wallet]+$lv3amount;
    $income_history3="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd3[d_id]', '$date', '$time', '+', '$lv3amount', '$withdrawal_abal3', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '3', 'Upgrade Income On Income', '');";
    $update_income_w3="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal3' WHERE `distributor`.`d_id` = $dd3[d_id];";
    if($con->query($income_history3)===TRUE && $con->query($update_income_w3)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 3');";
        $con->query($fail);
    }
    }
    //////////////level 4
    $sqd_id4="SELECT * FROM `distributor` WHERE `d_id`='$dd3[s_id]'";
    $qued4=$con->query($sqd_id4);
    $dd4=$qued4->fetch_assoc();
    if($dd4[u_status]=="y")
    {
    $lv4amount=$fet[amount]*10/100;
    $withdrawal_abal4=$dd4[withdrawal_wallet]+$lv4amount;
    $income_history4="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd4[d_id]', '$date', '$time', '+', '$lv4amount', '$withdrawal_abal4', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '4', 'Upgrade Income On Income', '');";
    $update_income_w4="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal4' WHERE `distributor`.`d_id` = $dd4[d_id];";
    if($con->query($income_history4)===TRUE && $con->query($update_income_w4)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 4');";
        $con->query($fail);
    }
    }
    //////////////level 5
    $sqd_id5="SELECT * FROM `distributor` WHERE `d_id`='$dd4[s_id]'";
    $qued5=$con->query($sqd_id5);
    $dd5=$qued5->fetch_assoc();
    if($dd5[u_status]=="y")
    {
    $lv5amount=$fet[amount]*10/100;
    $withdrawal_abal5=$dd5[withdrawal_wallet]+$lv5amount;
    $income_history5="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd5[d_id]', '$date', '$time', '+', '$lv5amount', '$withdrawal_abal5', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '5', 'Upgrade Income On Income', '');";
    $update_income_w5="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal5' WHERE `distributor`.`d_id` = $dd5[d_id];";
    if($con->query($income_history5)===TRUE && $con->query($update_income_w5)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 5');";
        $con->query($fail);
    }
    }
    //////////////level 6
    $sqd_id6="SELECT * FROM `distributor` WHERE `d_id`='$dd5[s_id]'";
    $qued6=$con->query($sqd_id6);
    $dd6=$qued6->fetch_assoc();
    if($dd6[u_status]=="y")
    {
    $lv6amount=$fet[amount]*20/100;
    $withdrawal_abal6=$dd6[withdrawal_wallet]+$lv6amount;
    $income_history6="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd6[d_id]', '$date', '$time', '+', '$lv6amount', '$withdrawal_abal6', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '6', 'Upgrade Income On Income', '');";
    $update_income_w6="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal6' WHERE `distributor`.`d_id` = $dd6[d_id];";
    if($con->query($income_history6)===TRUE && $con->query($update_income_w6)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 6');";
        $con->query($fail);
    }
    }*/
    echo $fet[uioi_id];
    $xxs="UPDATE `upgrade_income_on_income` SET `status` = 'y' WHERE `upgrade_income_on_income`.`uioi_id` = '$fet[uioi_id]';";
    if($con->query($xxs)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'update y to n in income on income');";
        $con->query($fail);
    }
}


/////////////////////for distributing Runner Rebirth
$sql="SELECT * FROM `upgrade_income_on_income` WHERE `status`='n' AND `club`='Runner Rebirth'";
$que=$con->query($sql);
while($fet=$que->fetch_assoc())
{
    //echo $fet[d_id]."a<br>";
    $sqd_id="SELECT * FROM `distributor` WHERE `d_id`='$fet[d_id]'";
    $qued=$con->query($sqd_id);
    $dd=$qued->fetch_assoc();
    //echo $dd[s_id]."b<br>";
    //////////////level 1
    $sqd_id1="SELECT * FROM `distributor` WHERE `d_id`='$dd[s_id]'";
    $qued1=$con->query($sqd_id1);
    $dd1=$qued1->fetch_assoc();
    if($dd1[u_status]=="y")
    {
    if(for_finding_level_1_income_to_distribute_runner($fet[d_id])=='1')
    {
        $lv1amount=$fet[amount]*40/100;
        $withdrawal_abal=$dd1[withdrawal_wallet]+$lv1amount;
        $income_history="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd1[d_id]', '$date', '$time', '+', '$lv1amount', '$withdrawal_abal', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '1', 'Upgrade Income On Income', '');";
        $update_income_w="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal' WHERE `distributor`.`d_id` = $dd1[d_id];";
        if($con->query($income_history)===TRUE && $con->query($update_income_w)===TRUE)
        {
            
        }
        else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 1');";
	        $con->query($fail);
        }
    }
    }
/*    //////////////level 2
    $sqd_id2="SELECT * FROM `distributor` WHERE `d_id`='$dd1[s_id]'";
    $qued2=$con->query($sqd_id2);
    $dd2=$qued2->fetch_assoc();
    if($dd2[u_status]=="y")
    {
    $lv2amount=$fet[amount]*10/100;
    $withdrawal_abal2=$dd2[withdrawal_wallet]+$lv2amount;
    $income_history2="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd2[d_id]', '$date', '$time', '+', '$lv2amount', '$withdrawal_abal2', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '2', 'Upgrade Income On Income', '');";
    $update_income_w2="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal2' WHERE `distributor`.`d_id` = $dd2[d_id];";
    if($con->query($income_history2)===TRUE && $con->query($update_income_w2)===TRUE)
    { 
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 2');";
        $con->query($fail);
    }
    }
    //////////////level 3
    $sqd_id3="SELECT * FROM `distributor` WHERE `d_id`='$dd2[s_id]'";
    $qued3=$con->query($sqd_id3);
    $dd3=$qued3->fetch_assoc();
    if($dd3[u_status]=="y")
    {
    $lv3amount=$fet[amount]*10/100;
    $withdrawal_abal3=$dd3[withdrawal_wallet]+$lv3amount;
    $income_history3="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd3[d_id]', '$date', '$time', '+', '$lv3amount', '$withdrawal_abal3', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '3', 'Upgrade Income On Income', '');";
    $update_income_w3="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal3' WHERE `distributor`.`d_id` = $dd3[d_id];";
    if($con->query($income_history3)===TRUE && $con->query($update_income_w3)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 3');";
        $con->query($fail);
    }
    }
    //////////////level 4
    $sqd_id4="SELECT * FROM `distributor` WHERE `d_id`='$dd3[s_id]'";
    $qued4=$con->query($sqd_id4);
    $dd4=$qued4->fetch_assoc();
    if($dd4[u_status]=="y")
    {
    $lv4amount=$fet[amount]*10/100;
    $withdrawal_abal4=$dd4[withdrawal_wallet]+$lv4amount;
    $income_history4="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd4[d_id]', '$date', '$time', '+', '$lv4amount', '$withdrawal_abal4', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '4', 'Upgrade Income On Income', '');";
    $update_income_w4="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal4' WHERE `distributor`.`d_id` = $dd4[d_id];";
    if($con->query($income_history4)===TRUE && $con->query($update_income_w4)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 4');";
        $con->query($fail);
    }
    }
    //////////////level 5
    $sqd_id5="SELECT * FROM `distributor` WHERE `d_id`='$dd4[s_id]'";
    $qued5=$con->query($sqd_id5);
    $dd5=$qued5->fetch_assoc();
    if($dd5[u_status]=="y")
    {
    $lv5amount=$fet[amount]*10/100;
    $withdrawal_abal5=$dd5[withdrawal_wallet]+$lv5amount;
    $income_history5="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd5[d_id]', '$date', '$time', '+', '$lv5amount', '$withdrawal_abal5', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '5', 'Upgrade Income On Income', '');";
    $update_income_w5="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal5' WHERE `distributor`.`d_id` = $dd5[d_id];";
    if($con->query($income_history5)===TRUE && $con->query($update_income_w5)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 5');";
        $con->query($fail);
    }
    }
    //////////////level 6
    $sqd_id6="SELECT * FROM `distributor` WHERE `d_id`='$dd5[s_id]'";
    $qued6=$con->query($sqd_id6);
    $dd6=$qued6->fetch_assoc();
    if($dd6[u_status]=="y")
    {
    $lv6amount=$fet[amount]*20/100;
    $withdrawal_abal6=$dd6[withdrawal_wallet]+$lv6amount;
    $income_history6="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$dd6[d_id]', '$date', '$time', '+', '$lv6amount', '$withdrawal_abal6', 'Upgrade Income On Income', 'Upgrade Income On Income', '', '', '$fet[d_id]', '6', 'Upgrade Income On Income', '');";
    $update_income_w6="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_abal6' WHERE `distributor`.`d_id` = $dd6[d_id];";
    if($con->query($income_history6)===TRUE && $con->query($update_income_w6)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Income On Income level 6');";
        $con->query($fail);
    }
    }*/
    echo $fet[uioi_id];
    $xxs="UPDATE `upgrade_income_on_income` SET `status` = 'y' WHERE `upgrade_income_on_income`.`uioi_id` = '$fet[uioi_id]';";
    if($con->query($xxs)===TRUE)
    {
        
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'update y to n in income on income');";
        $con->query($fail);
    }
}




echo "<script>alert('Refreshed ! Distributed Income On Income'); location.href='index.php';</script>";