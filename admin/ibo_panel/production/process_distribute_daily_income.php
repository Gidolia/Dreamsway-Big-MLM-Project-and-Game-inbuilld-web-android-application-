<?php
include "config.php";
if(isset($_POST[distribute_level]))
{
    $dire="SELECT * FROM `distributor` WHERE `a_status`='y' AND `daily_income_distri`=''";
    $cv=$con->query($dire);
    while($fetc=$cv->fetch_assoc())
    {
        echo $fetc[d_id]." , ".$fetc[daily_income_day]."<br>";
        if($fetc[daily_income_day]<=9)
        {
            echo "fdsf";
///////////////////////////////////for level 1 
unset($fet1);
$dilv1="SELECT * FROM `distributor` WHERE `d_id`='$fetc[s_id]'";
$que1=$con->query($dilv1);
if($que1->num_rows>0){
    $fet1=$que1->fetch_assoc();
    $lv1am=$_POST[lv1];
    $coin1=$lv1am*10;
    $acoin1=$fet1[ludo_coin]+$coin1;
    $coin1_up="UPDATE `distributor` SET `ludo_coin` = '$acoin1' WHERE `distributor`.`d_id` = '$fetc[s_id]';";
    $coin1_ins="INSERT INTO `ludo_coin_history` (`lch_id`, `d_id`, `coin`, `type`, `a_coin`, `date`, `time`, `note`, `activated_id`) VALUES (NULL, '$fet1[d_id]', '$coin1', '+', '$acoin1', '$date', '$time', 'Leadership Income', '$fetc[d_id]');";
    if($con->query($coin1_up)===TRUE && $con->query($coin1_ins)===TRUE)
    {
        
    }else{ 
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'daily income in lv1');";
        $con->query($fail);
    }
}
///////////////////////////////////for level 2
unset($fet2);
$dilv2="SELECT * FROM `distributor` WHERE `d_id`='$fet1[s_id]'";
$que2=$con->query($dilv2);
if($que2->num_rows>0){
    $fet2=$que2->fetch_assoc();
    $lv2am=$_POST[lv2];
    $coin2=$lv2am*10;
    $acoin2=$fet2[ludo_coin]+$coin2;
    $coin2_up="UPDATE `distributor` SET `ludo_coin` = '$acoin2' WHERE `distributor`.`d_id` = '$fet2[d_id]';";
    $coin2_ins="INSERT INTO `ludo_coin_history` (`lch_id`, `d_id`, `coin`, `type`, `a_coin`, `date`, `time`, `note`, `activated_id`) VALUES (NULL, '$fet2[d_id]', '$coin2', '+', '$acoin2', '$date', '$time', 'Leadership Income', '$fetc[d_id]');";
    if($con->query($coin2_up)===TRUE && $con->query($coin2_ins)===TRUE)
    {
        
    }else{ 
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'daily income in lv2');";
        $con->query($fail);
    }
}
///////////////////////////////////for level 3
unset($fet3);
$dilv3="SELECT * FROM `distributor` WHERE `d_id`='$fet2[s_id]'";
$que3=$con->query($dilv3);
if($que3->num_rows>0){
    $fet3=$que3->fetch_assoc();
    $lv3am=$_POST[lv3];
    $coin3=$lv3am*10;
    $acoin3=$fet3[ludo_coin]+$coin3;
    $coin3_up="UPDATE `distributor` SET `ludo_coin` = '$acoin3' WHERE `distributor`.`d_id` = '$fet3[d_id]';";
    $coin3_ins="INSERT INTO `ludo_coin_history` (`lch_id`, `d_id`, `coin`, `type`, `a_coin`, `date`, `time`, `note`, `activated_id`) VALUES (NULL, '$fet3[d_id]', '$coin3', '+', '$acoin3', '$date', '$time', 'Leadership Income', '$fetc[d_id]');";
    if($con->query($coin3_up)===TRUE && $con->query($coin3_ins)===TRUE)
    {
        
    }else{ 
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'daily income in lv3');";
        $con->query($fail);
    }
}
///////////////////////////////////for level 4
unset($fet4);
$dilv4="SELECT * FROM `distributor` WHERE `d_id`='$fet3[s_id]'";
$que4=$con->query($dilv4);
if($que4->num_rows>0){
    $fet4=$que4->fetch_assoc();
    $lv4am=$_POST[lv4];
    $coin4=$lv4am*10;
    $acoin4=$fet4[ludo_coin]+$coin4;
    $coin4_up="UPDATE `distributor` SET `ludo_coin` = '$acoin4' WHERE `distributor`.`d_id` = '$fet4[d_id]';";
    $coin4_ins="INSERT INTO `ludo_coin_history` (`lch_id`, `d_id`, `coin`, `type`, `a_coin`, `date`, `time`, `note`, `activated_id`) VALUES (NULL, '$fet4[d_id]', '$coin4', '+', '$acoin4', '$date', '$time', 'Leadership Income', '$fetc[d_id]');";
    if($con->query($coin4_up)===TRUE && $con->query($coin4_ins)===TRUE)
    {
        
    }else{ 
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'daily income in lv4');";
        $con->query($fail);
    }
}
///////////////////////////////////for level 5
unset($fet5);
$dilv5="SELECT * FROM `distributor` WHERE `d_id`='$fet4[s_id]'";
$que5=$con->query($dilv5);
if($que5->num_rows>0){
    $fet5=$que5->fetch_assoc();
    $lv5am=$_POST[lv5];
    $coin5=$lv5am*10;
    $acoin5=$fet5[ludo_coin]+$coin5;
    $coin5_up="UPDATE `distributor` SET `ludo_coin` = '$acoin5' WHERE `distributor`.`d_id` = '$fet5[d_id]';";
    $coin5_ins="INSERT INTO `ludo_coin_history` (`lch_id`, `d_id`, `coin`, `type`, `a_coin`, `date`, `time`, `note`, `activated_id`) VALUES (NULL, '$fet5[d_id]', '$coin5', '+', '$acoin5', '$date', '$time', 'Leadership Income', '$fetc[d_id]');";
    if($con->query($coin5_up)===TRUE && $con->query($coin5_ins)===TRUE)
    {
        
    }else{ 
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'daily income in lv5');";
        $con->query($fail);
    }
}
///////////////////////////////////for level 6
unset($fet6);
$dilv6="SELECT * FROM `distributor` WHERE `d_id`='$fet5[s_id]'";
$que6=$con->query($dilv6);
if($que6->num_rows>0){
    $fet6=$que6->fetch_assoc();
    $lv6am=$_POST[lv6];
    $coin6=$lv6am*10;
    $acoin6=$fet6[ludo_coin]+$coin6;
    $coin6_up="UPDATE `distributor` SET `ludo_coin` = '$acoin6' WHERE `distributor`.`d_id` = '$fet6[d_id]';";
    $coin6_ins="INSERT INTO `ludo_coin_history` (`lch_id`, `d_id`, `coin`, `type`, `a_coin`, `date`, `time`, `note`, `activated_id`) VALUES (NULL, '$fet6[d_id]', '$coin6', '+', '$acoin6', '$date', '$time', 'Leadership Income', '$fetc[d_id]');";
    if($con->query($coin6_up)===TRUE && $con->query($coin6_ins)===TRUE)
    {
        
    }else{ 
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'daily income in lv6');";
        $con->query($fail);
    }
}


        $days=$fetc[daily_income_day]+1;
        $refty="UPDATE `distributor` SET `daily_income_day` = '$days' WHERE `distributor`.`d_id` = '$fetc[d_id]';";
        //echo $refty;
        if($con->query($refty)===TRUE)
        {
            
        }else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'update daily income days');";
            $con->query($fail);
        }
        
        }
    }
    echo "Success<br>";
    echo "<script>alert('Income distributed successfully');
		location.href='distribute_daily_income.php';</script>";
}


?>