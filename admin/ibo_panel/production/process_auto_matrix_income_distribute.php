<?php
include "config.php";

function distribute_income($amt_id)
{
    global $con, $date, $time;
    $ds="SELECT s_id FROM `auto_matrix_tree` WHERE `amt_id`='$amt_id'";
    $az=$con->query($ds);
    if($az->num_rows>0)
    {
        $fet=$az->fetch_assoc();
    
///////////////////////////////////////level 1 5/-
$lv1="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet[s_id]'";
$que1=$con->query($lv1);
$fet1=$que1->fetch_assoc();
if($que1->num_rows>0)
{
    //echo $fet1[amt_id]." ->lv1";
    $sql="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet1[amt_id]', '$fet1[d_id]', '$date', '$time', '5', '1', '$amt_id');";
    $dddd1="SELECT * FROM `distributor` WHERE `d_id`='$fet1[d_id]'";
    $sdcdd1=$con->query($dddd1);
    $lnm1=$sdcdd1->fetch_assoc();
    $withdrawal_wallet1=$lnm1[withdrawal_wallet]+5;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet1[d_id]', '$date', '$time', '+', '5', '$withdrawal_wallet1', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '1');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet1' WHERE `distributor`.`d_id` = '$fet1[d_id]';";
}
///////////////////////////////////////level 2 4/-
$lv2="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet1[s_id]'";
$que2=$con->query($lv2);
$fet2=$que2->fetch_assoc();
if($que2->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet2[amt_id]', '$fet2[d_id]', '$date', '$time', '4', '2', '$amt_id');";
    $dddd2="SELECT * FROM `distributor` WHERE `d_id`='$fet2[d_id]'";
    $sdcdd2=$con->query($dddd2);
    $lnm2=$sdcdd2->fetch_assoc();
    $withdrawal_wallet2=$lnm2[withdrawal_wallet]+4;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet2[d_id]', '$date', '$time', '+', '4', '$withdrawal_wallet2', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '2');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet2' WHERE `distributor`.`d_id` = '$fet2[d_id]';";
}
///////////////////////////////////////level 3 3/-
$lv3="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet2[s_id]'";
$que3=$con->query($lv3);
$fet3=$que3->fetch_assoc();
if($que3->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet3[amt_id]', '$fet3[d_id]', '$date', '$time', '3', '3', '$amt_id');";
    $dddd3="SELECT * FROM `distributor` WHERE `d_id`='$fet3[d_id]'";
    $sdcdd3=$con->query($dddd3);
    $lnm3=$sdcdd3->fetch_assoc();
    $withdrawal_wallet3=$lnm3[withdrawal_wallet]+3;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet3[d_id]', '$date', '$time', '+', '3', '$withdrawal_wallet3', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '3');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet3' WHERE `distributor`.`d_id` = '$fet3[d_id]';";
}
///////////////////////////////////////level 4 2/-
$lv4="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet3[s_id]'";
$que4=$con->query($lv4);
$fet4=$que4->fetch_assoc();
if($que4->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet4[amt_id]', '$fet4[d_id]', '$date', '$time', '2', '4', '$amt_id');";
    $dddd4="SELECT * FROM `distributor` WHERE `d_id`='$fet4[d_id]'";
    $sdcdd4=$con->query($dddd4);
    $lnm4=$sdcdd4->fetch_assoc();
    $withdrawal_wallet4=$lnm4[withdrawal_wallet]+2;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet4[d_id]', '$date', '$time', '+', '2', '$withdrawal_wallet4', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '4');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet4' WHERE `distributor`.`d_id` = '$fet4[d_id]';";
}
///////////////////////////////////////level 5 1/-
$lv5="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet4[s_id]'";
$que5=$con->query($lv5);
$fet5=$que5->fetch_assoc();
if($que5->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet5[amt_id]', '$fet5[d_id]', '$date', '$time', '1', '5', '$amt_id');";
    $dddd5="SELECT * FROM `distributor` WHERE `d_id`='$fet5[d_id]'";
    $sdcdd5=$con->query($dddd5);
    $lnm5=$sdcdd5->fetch_assoc();
    $withdrawal_wallet5=$lnm5[withdrawal_wallet]+1;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet5[d_id]', '$date', '$time', '+', '1', '$withdrawal_wallet5', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '5');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet5' WHERE `distributor`.`d_id` = '$fet5[d_id]';";
}
///////////////////////////////////////level 6 1/-
$lv6="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet5[s_id]'";
$que6=$con->query($lv6);
$fet6=$que6->fetch_assoc();
if($que6->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet6[amt_id]', '$fet6[d_id]', '$date', '$time', '1', '6', '$amt_id');";
    $dddd6="SELECT * FROM `distributor` WHERE `d_id`='$fet6[d_id]'";
    $sdcdd6=$con->query($dddd6);
    $lnm6=$sdcdd6->fetch_assoc();
    $withdrawal_wallet6=$lnm6[withdrawal_wallet]+1;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet6[d_id]', '$date', '$time', '+', '1', '$withdrawal_wallet6', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '6');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet6' WHERE `distributor`.`d_id` = '$fet6[d_id]';";
}
///////////////////////////////////////level 7 2/-
$lv7="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet6[s_id]'";
$que7=$con->query($lv7);
$fet7=$que7->fetch_assoc();
if($que7->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet7[amt_id]', '$fet7[d_id]', '$date', '$time', '2', '7', '$amt_id');";
    $dddd7="SELECT * FROM `distributor` WHERE `d_id`='$fet7[d_id]'";
    $sdcdd7=$con->query($dddd7);
    $lnm7=$sdcdd7->fetch_assoc();
    $withdrawal_wallet7=$lnm7[withdrawal_wallet]+2;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet7[d_id]', '$date', '$time', '+', '2', '$withdrawal_wallet7', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '7');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet7' WHERE `distributor`.`d_id` = '$fet7[d_id]';";
}
///////////////////////////////////////level 8 1/-
$lv8="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet7[s_id]'";
$que8=$con->query($lv8);
$fet8=$que8->fetch_assoc();
if($que8->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet8[amt_id]', '$fet8[d_id]', '$date', '$time', '1', '8', '$amt_id');";
    $dddd8="SELECT * FROM `distributor` WHERE `d_id`='$fet8[d_id]'";
    $sdcdd8=$con->query($dddd8);
    $lnm8=$sdcdd8->fetch_assoc();
    $withdrawal_wallet8=$lnm8[withdrawal_wallet]+1;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet8[d_id]', '$date', '$time', '+', '1', '$withdrawal_wallet8', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '8');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet8' WHERE `distributor`.`d_id` = '$fet8[d_id]';";
}

///////////////////////////////////////level 9 3/-
$lv9="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet8[s_id]'";
$que9=$con->query($lv9);
$fet9=$que9->fetch_assoc();
if($que9->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet9[amt_id]', '$fet9[d_id]', '$date', '$time', '3', '9', '$amt_id');";
    $dddd9="SELECT * FROM `distributor` WHERE `d_id`='$fet9[d_id]'";
    $sdcdd9=$con->query($dddd9);
    $lnm9=$sdcdd9->fetch_assoc();
    $withdrawal_wallet9=$lnm9[withdrawal_wallet]+3;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet9[d_id]', '$date', '$time', '+', '3', '$withdrawal_wallet9', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '9');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet9' WHERE `distributor`.`d_id` = '$fet9[d_id]';";
}

///////////////////////////////////////level 10 6/-
$lv10="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet9[s_id]'";
$que10=$con->query($lv10);
$fet10=$que10->fetch_assoc();
if($que10->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet10[amt_id]', '$fet10[d_id]', '$date', '$time', '6', '10', '$amt_id');";
    $dddd10="SELECT * FROM `distributor` WHERE `d_id`='$fet10[d_id]'";
    $sdcdd10=$con->query($dddd10);
    $lnm10=$sdcdd10->fetch_assoc();
    $withdrawal_wallet10=$lnm10[withdrawal_wallet]+6;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet10[d_id]', '$date', '$time', '+', '6', '$withdrawal_wallet10', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '10');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet10' WHERE `distributor`.`d_id` = '$fet10[d_id]';";
}/*
///////////////////////////////////////level 11 2/-
$lv11="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet10[s_id]'";
$que11=$con->query($lv11);
$fet11=$que11->fetch_assoc();
if($que11->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet11[amt_id]', '$fet11[d_id]', '$date', '$time', '2', '11', '$amt_id');";
    $dddd11="SELECT * FROM `distributor` WHERE `d_id`='$fet11[d_id]'";
    $sdcdd11=$con->query($dddd11);
    $lnm11=$sdcdd11->fetch_assoc();
    $withdrawal_wallet11=$lnm11[withdrawal_wallet]+2;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet11[d_id]', '$date', '$time', '+', '2', '$withdrawal_wallet11', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '11');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet11' WHERE `distributor`.`d_id` = '$fet11[d_id]';";
}
///////////////////////////////////////level 12 2/-
$lv12="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet11[s_id]'";
$que12=$con->query($lv12);
$fet12=$que12->fetch_assoc();
if($que12->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet12[amt_id]', '$fet12[d_id]', '$date', '$time', '2', '12', '$amt_id');";
    $dddd12="SELECT * FROM `distributor` WHERE `d_id`='$fet12[d_id]'";
    $sdcdd12=$con->query($dddd12);
    $lnm12=$sdcdd12->fetch_assoc();
    $withdrawal_wallet12=$lnm12[withdrawal_wallet]+2;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet12[d_id]', '$date', '$time', '+', '2', '$withdrawal_wallet12', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '12');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet12' WHERE `distributor`.`d_id` = '$fet12[d_id]';";
}
//////////////////////////////////////level 13 2/-
$lv13="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet12[s_id]'";
$que13=$con->query($lv13);
$fet13=$que13->fetch_assoc();
if($que13->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet13[amt_id]', '$fet13[d_id]', '$date', '$time', '2', '13', '$amt_id');";
    $dddd13="SELECT * FROM `distributor` WHERE `d_id`='$fet13[d_id]'";
    $sdcdd13=$con->query($dddd13);
    $lnm13=$sdcdd13->fetch_assoc();
    $withdrawal_wallet13=$lnm13[withdrawal_wallet]+2;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet13[d_id]', '$date', '$time', '+', '2', '$withdrawal_wallet13', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '13');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet13' WHERE `distributor`.`d_id` = '$fet13[d_id]';";
}
//////////////////////////////////////level 14 2/-
$lv14="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet13[s_id]'";
$que14=$con->query($lv14);
$fet14=$que14->fetch_assoc();
if($que14->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet14[amt_id]', '$fet14[d_id]', '$date', '$time', '2', '14', '$amt_id');";
    $dddd14="SELECT * FROM `distributor` WHERE `d_id`='$fet14[d_id]'";
    $sdcdd14=$con->query($dddd14);
    $lnm14=$sdcdd14->fetch_assoc();
    $withdrawal_wallet14=$lnm14[withdrawal_wallet]+2;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet14[d_id]', '$date', '$time', '+', '2', '$withdrawal_wallet14', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '14');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet14' WHERE `distributor`.`d_id` = '$fet14[d_id]';";
}
//////////////////////////////////////level 15 3/-
$lv15="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet14[s_id]'";
$que15=$con->query($lv15);
$fet15=$que15->fetch_assoc();
if($que15->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet15[amt_id]', '$fet15[d_id]', '$date', '$time', '3', '15', '$amt_id');";
    $dddd15="SELECT * FROM `distributor` WHERE `d_id`='$fet15[d_id]'";
    $sdcdd15=$con->query($dddd15);
    $lnm15=$sdcdd15->fetch_assoc();
    $withdrawal_wallet15=$lnm15[withdrawal_wallet]+3;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet15[d_id]', '$date', '$time', '+', '3', '$withdrawal_wallet15', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '15');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet15' WHERE `distributor`.`d_id` = '$fet15[d_id]';";
}
//////////////////////////////////////level 16 6/-
$lv16="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet15[s_id]'";
$que16=$con->query($lv16);
$fet16=$que16->fetch_assoc();
if($que16->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet16[amt_id]', '$fet16[d_id]', '$date', '$time', '6', '16', '$amt_id');";
    $dddd16="SELECT * FROM `distributor` WHERE `d_id`='$fet16[d_id]'";
    $sdcdd16=$con->query($dddd16);
    $lnm16=$sdcdd16->fetch_assoc();
    $withdrawal_wallet16=$lnm16[withdrawal_wallet]+6;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet16[d_id]', '$date', '$time', '+', '6', '$withdrawal_wallet16', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '16');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet16' WHERE `distributor`.`d_id` = '$fet16[d_id]';";
}
//////////////////////////////////////level 17 8/-
$lv17="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet16[s_id]'";
$que17=$con->query($lv17);
$fet17=$que17->fetch_assoc();
if($que17->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet17[amt_id]', '$fet17[d_id]', '$date', '$time', '8', '17', '$amt_id');";
    $dddd17="SELECT * FROM `distributor` WHERE `d_id`='$fet17[d_id]'";
    $sdcdd17=$con->query($dddd17);
    $lnm17=$sdcdd17->fetch_assoc();
    $withdrawal_wallet17=$lnm17[withdrawal_wallet]+8;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet17[d_id]', '$date', '$time', '+', '8', '$withdrawal_wallet17', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '17');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet17' WHERE `distributor`.`d_id` = '$fet17[d_id]';";
}
//////////////////////////////////////level 18 13/-
$lv18="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet17[s_id]'";
$que18=$con->query($lv18);
$fet18=$que18->fetch_assoc();
if($que18->num_rows>0)
{
    $sql .="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `date`, `time`, `amount`, `level`, `for_amt_id`) VALUES (NULL, '$fet18[amt_id]', '$fet18[d_id]', '$date', '$time', '13', '18', '$amt_id');";
    $dddd18="SELECT * FROM `distributor` WHERE `d_id`='$fet18[d_id]'";
    $sdcdd18=$con->query($dddd18);
    $lnm18=$sdcdd18->fetch_assoc();
    $withdrawal_wallet18=$lnm18[withdrawal_wallet]+13;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$fet18[d_id]', '$date', '$time', '+', '13', '$withdrawal_wallet18', 'Auto Matrix Income', 'Auto Matrix', '', '', '', '18');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet18' WHERE `distributor`.`d_id` = '$fet18[d_id]';";
}*/

$sql .="UPDATE `auto_matrix_tree` SET `i_distributed` = 'y' WHERE `amt_id`='$amt_id'";

if($con->multi_query($sql)===TRUE)
{
    while ($con->next_result()) {;} // flush multi_queries
    $s=1;
}
else{
     $ef="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'auto matrix income distributing in function', '$amt_id');";
	 $con->query($ef);
	 $s=0;
}
        
        
    }else{
        $ef="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'auto matrix income distributing in function', '$amt_id', `f_amt_id`);";
	                $con->query($ef);
	                $s=0;
    }
    return $s;
}


    $ds="SELECT * FROM `auto_matrix_tree` WHERE `i_distributed`='n' AND `id_type`='r'";
    $sx=$con->query($ds);
    $count_n_id=$sx->num_rows;
    echo $count_n_id." count <br>";
    $tot_pending_id=$count_n_id*2;
    
    ////////////////////////for finding max id
    $sqlkj="SELECT MAX(amt_id) as max FROM `auto_matrix_tree`";
  	$dfgh=$con->query($sqlkj);
	$fdbv=mysqli_fetch_array($dfgh);
	$amt_id=$fdbv[max];
	$upto_amt_id=$amt_id-$tot_pending_id;
	$acccc=0;
    for($x=0; $x<$tot_pending_id; $x++)
    {
        
        $xs="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$amt_id'";
        $xc=$con->query($xs);
        if($xc->num_rows>0){
        $acccc++;
        
        if(distribute_income($amt_id)!=1)
        {$ef="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'auto matrix income distributing in function', '$amt_id');";
	       $con->query($ef);
            
        }
        
        echo $amt_id."->amtid <br>";
        }else{$x--;}
        $amt_id=$amt_id-1;
    }
    $vcvvcv="UPDATE `auto_matrix_tree` SET `i_distributed` = 'y'";
        $con->query($vcvvcv);
   echo "<script>alert('Refreshed ! Auto matrix income Distributed'); location.href='auto_matrix_tree_view.php';</script>";

//echo distribute_income(1513);




?>