<?php
include "config.php";
if(isset($_POST[wallet_transfer]))
{
    if($_POST[amount]>=500){
        if($d_detail[a_status]=="y")
        {
        $a_income_wallet_bal=$d_detail[withdrawal_wallet]-$_POST[amount];
        
        if($d_detail[pan_a]=='y')
        {
            $tds=$_POST[amount]*5/100;
        }else{$tds=$_POST[amount]*20/100;}
        $admin=$_POST[amount]*10/100;
        $a_amount=$_POST[amount]-$admin-$tds;
        
        
        $a_main_wallet=$d_detail[main_wallet]+$a_amount;
        $a_tds_wallet=$d_detail[tds_wallet]+$tds;
        
        if($a_income_wallet_bal>=0)
        {
            $u_iw="UPDATE `distributor` SET `withdrawal_wallet` = '$a_income_wallet_bal' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
            $u_iw .="UPDATE `distributor` SET `main_wallet` = '$a_main_wallet' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
            $u_iw .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '-', '$_POST[amount]', '$a_income_wallet_bal', 'Transfer to Withdrawal Wallet', '', '', '', '', '');";
            $u_iw .="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`) VALUES (NULL, '$_SESSION[d_id]', '+', '$a_amount', '$a_main_wallet', '', '', '', 'Received From Income Wallet', '$date', '$time');";
            $u_iw .="UPDATE `distributor` SET `tds_wallet` = '$a_tds_wallet' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
            
            $u_iw .="INSERT INTO `tds_collected_history` (`tch_id`, `d_id`, `date`, `time`, `tds_amount`, `withdraw_amount`, `type`, `a_tds`, `note`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '$tds', '$_POST[amount]', '+', '$a_tds_wallet', 'Income Wallet Transfer to Withdrawal Wallet');";
            $u_iw .="INSERT INTO `transfer_iw_to_ww_history` (`titwh_id`, `d_id`, `date`, `time`, `amount`, `tds`, `admin`, `amount_credited`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '$_POST[amount]', '$tds', '$admin', '$a_amount');";
            if($con->multi_query($u_iw)===TRUE){
                echo "<script>alert('Successfully Transfered'); location.href='transfer_iw_ww.php';</script>";
            }
            else{
                $erf="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'wallet transfering', '', 'n');";
                echo "<script>alert('Failed Plz try Again'); location.href='transfer_iw_ww.php';</script>";
            }
        }
        }
        else{
             echo "<script>alert('Failed! ID must be activated'); location.href='transfer_iw_ww.php';</script>";
        }
    }
    else{echo "<script>alert('Value Must be Greater then 500/-'); location.href='transfer_iw_ww.php';</script>";}
}
//active and 4 direct activate
?>
