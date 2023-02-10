<?php
include "config.php";
if(isset($_POST[confirm_buy_pin]))
{
    $pin_amount=$_POST[pins]*2999;
    $pin_c=0;
    $a_pin=$d_detail[u_pin_wallet]+$_POST[pins];
    $pin_tot_amount=$pin_amount+$pin_c;
    
    $que="INSERT INTO `buy_u_pin_history` (`buph_id`, `d_id`, `date`, `time`, `pin_qty`, `amount`, `pin_gen_charge`, `tds_cut`, `total_amount`, `purchase_wallet`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '$_POST[pins]', '$pin_amount', '$pin_c', '', '$pin_tot_amount', 'main wallet');";
    
    
    $up_que="UPDATE `distributor` SET `u_pin_wallet` = '$a_pin' WHERE `distributor`.`d_id` = $_SESSION[d_id];";
    
    $his_que="INSERT INTO `u_pin_wallet` (`upw_id`, `date`, `time`, `d_id`, `pin_qty`, `from_d_id`, `to_d_id`, `admin`, `type`, `note`, `req_no`, `pin_a_d_id`, `pin_used`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '$_POST[pins]', 'admin', '', 'y', '+', 'Purchase From Admin', '', '', '');";
    
    $balaaa=$d_detail[main_wallet]-$pin_tot_amount;
    $uss="UPDATE `distributor` SET `main_wallet` = '$balaaa' WHERE `distributor`.`d_id` = $_SESSION[d_id];";
    $dccccx="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `recharge_unq_id`) VALUES (NULL, '$_SESSION[d_id]', '-', '$pin_tot_amount', '$balaaa', 'Upgrade Pin Purchased', '', '', 'upin', '$date', '$time', '');";
    
    
    
    
    
    if($balaaa>=0){
    if($con->query($que)===TRUE && $con->query($up_que)===TRUE && $con->query($his_que)===TRUE && $con->query($uss)===TRUE && $con->query($dccccx)===TRUE)
    {
        echo "<script>alert('UPin Generated Sucessfully'); location.href='upin_generate.php';</script>";
    }
    else{
        echo "<script>alert('Failed! plz try again '); location.href='upin_generate.php';</script>";
    }
        
    }else{echo "<script>alert('Failed! You Dont have balance '); location.href='upin_generate.php';</script>";
    }
    
}