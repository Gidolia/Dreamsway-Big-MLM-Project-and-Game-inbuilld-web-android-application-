<?php
include "config.php";
if(isset($_POST[confirm_buy_pin]))
{
    $pin_amount=$_POST[pins]*1180;
    $a_pin=$d_detail[pin_wallet]+$_POST[pins];
    $balaaa=$d_detail[main_wallet]-$pin_amount;
    $que="INSERT INTO `buy_pin_history` (`bph_id`, `d_id`, `date`, `time`, `pin_qty`, `amount`, `pin_gen_charge`, `tds_cut`, `total_amount`, `pin_type`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '$_POST[pins]', '$pin_amount', '0', '0', '$pin_amount', '1180');";
    
  //  $with_min=sub_withdrawal_amount($_SESSION[d_id], $pin_tot_amount, "Pin Purchased", '', 'admin');
    
    
    $ins_mw="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`) VALUES (NULL, '$_SESSION[d_id]', '-', '$pin_amount', '$balaaa', 'Pin Purchased', '', '', 'Pin Purchased', '$date', '$time');";
    $u_mw="UPDATE `distributor` SET `main_wallet` = '$balaaa' WHERE `distributor`.`d_id` = $_SESSION[d_id];";
    $up_que="UPDATE `distributor` SET `pin_wallet` = '$a_pin' WHERE `distributor`.`d_id` = $_SESSION[d_id];";
    
    $his_que="INSERT INTO `pin_wallet` (`pw_id`, `date`, `time`, `d_id`, `pin_qty`, `from_d_id`, `to_d_id`, `admin`, `type`, `note`, `req_no`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '$_POST[pins]', 'admin', '', 'y', '+', 'Purchase From Admin', '');";
    if($balaaa>=0){
    if($con->query($ins_mw)===TRUE && $con->query($u_mw)===TRUE && $con->query($que)===TRUE && $con->query($up_que)===TRUE && $con->query($his_que)===TRUE)
    {
        ////////////////////for sending sms
        $message='DS'.$_SESSION[d_id].' Your Pin credited with '.$_POST[pins].' Now Your Pin Wallet is '.$a_pin.', Dreamsway Sure';
        send_sms($d_detail[mobile], $message, 'Pin Purchased', $_SESSION[d_id]);
		///////////
		////////////////////for sending sms
        $message='DS'.$_SESSION[d_id].' Your Withdrawal Wallet debited with '.$pin_amount.' Now Your Withdrawal Wallet is '.$balaaa.', Dreamsway Sure';
        send_sms($d_detail[mobile], $message, 'Income Wallet Info', $_SESSION[d_id]);
		///////////
        echo "<script>alert('Success! 1180Rs Pin Purchased Successfully '); location.href='pin_generate.php';</script>";
    }
    else{
        $ent_fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'buy pin through withdrawal wallet', '', 'y');";
        $con->query($ent_fail);
        echo "<script>alert('Failed! plz try again '); location.href='pin_generate.php';</script>";
    }
    }else{echo "<script>alert('Failed! plz try again '); location.href='pin_generate.php';</script>";
    }
    
}