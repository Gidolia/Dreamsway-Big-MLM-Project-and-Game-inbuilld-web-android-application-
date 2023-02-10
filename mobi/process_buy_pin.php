<?php
include "config.php";
if(isset($_POST[confirm_buy_pin]))
{
    $pin_amount=$_POST[pins]*1180;
    $pin_c=$pin_amount*5/100;
    $a_pin=$d_detail[pin_wallet]+$_POST[pins];
    $a_tds=$d_detail[pin_wallet]+$_POST[pins];
    if($d_detail[pan_a]=='y')
    {
       
        $pin_tds=($pin_amount+$pin_c)*5/100;
    }else{$pin_tds=($pin_amount+$pin_c)*20/100;}
    $a_tds=$d_detail[tds_wallet]+$pin_tds;
    $pin_tot_amount=$pin_amount+$pin_c+$pin_tds;
    
    $que="INSERT INTO `buy_pin_history` (`bph_id`, `d_id`, `date`, `time`, `pin_qty`, `amount`, `pin_gen_charge`, `tds_cut`, `total_amount`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '$_POST[pins]', '$pin_amount', '$pin_c', '$pin_tds', '$pin_tot_amount');";
    
    $with_min=sub_withdrawal_amount($_SESSION[d_id], $pin_tot_amount, "Pin Purchased", '', 'admin');
    
    $up_que="UPDATE `distributor` SET `pin_wallet` = '$a_pin' WHERE `distributor`.`d_id` = $_SESSION[d_id];";
    
    $his_que="INSERT INTO `pin_wallet` (`pw_id`, `date`, `time`, `d_id`, `pin_qty`, `from_d_id`, `to_d_id`, `admin`, `type`, `note`, `req_no`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '$_POST[pins]', 'admin', '', 'y', '+', 'Purchase From Admin', '');";
    $ws=$pin_c+$pin_amount;
    $tds_ins="INSERT INTO `tds_collected_history` (`tch_id`, `d_id`, `date`, `time`, `tds_amount`, `withdraw_amount`, `type`, `a_tds`, `note`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '$pin_tds', '$ws', '+', '', 'Pin Purchased');";
    
    $tds_update="UPDATE `distributor` SET `tds_wallet` = '$a_tds' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
    $balaaa=$d_detail[withdrawal_wallet]-$pin_tot_amount;
    if($balaaa>=0){
    if($with_min==1 && $con->query($que)===TRUE && $con->query($up_que)===TRUE && $con->query($his_que)===TRUE && $con->query($tds_ins)===TRUE && $con->query($tds_update)===TRUE)
    {
        ////////////////////for sending sms
        $message='DS'.$_SESSION[d_id].' Your Pin credited with '.$_POST[pins].' Now Your Pin Wallet is '.$a_pin.', Dreamsway Sure';
        send_sms($d_detail[mobile], $message, 'Pin Purchased', $_SESSION[d_id]);
		///////////
		////////////////////for sending sms
        $message='DS'.$_SESSION[d_id].' Your Income Wallet debited with '.$pin_tot_amount.' Now Your Income Wallet is '.$balaaa.', Dreamsway Sure';
        send_sms($d_detail[mobile], $message, 'Income Wallet Info', $_SESSION[d_id]);
		///////////
        echo "<script>location.href='pin_generate.php?s=s';</script>";
    }
    else{
        $ent_fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'buy pin through Income wallet', '', 'y');";
        $con->query($ent_fail);
        echo "<script>location.href='pin_generate.php?s=q_f';</script>";
    }
        
    }else{echo "<script>location.href='pin_generate.php?s=u_bal';</script>";
    }
    
}