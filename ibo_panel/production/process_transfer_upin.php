<?php
include "config.php";
if(isset($_POST[transfer_upin]))
{
    function isNumber($c) {
        return preg_match('/[0-9]/', $c);
    }
    
    $string=$_POST[to_d_id];
       
    $chars = '';
    $to_d_id = '';
    for ($index=0;$index<strlen($string);$index++) {
        if(isNumber($string[$index]))
        {
            $to_d_id .= $string[$index];
        }
        else {
            $chars .= $string[$index];}
    }
if($to_d_id!=$_SESSION[d_id])
{
    ////////////////////////from d_id
    
    $a_pin=$d_detail[u_pin_wallet]-$_POST[pins];
    if($a_pin>=0)
    {
        $up_que="UPDATE `distributor` SET `u_pin_wallet` = '$a_pin' WHERE `distributor`.`d_id` = $_SESSION[d_id];";
        
        $his_que="INSERT INTO `u_pin_wallet` (`upw_id`, `date`, `time`, `d_id`, `pin_qty`, `from_d_id`, `to_d_id`, `admin`, `type`, `note`, `req_no`, `pin_a_d_id`, `pin_used`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '$_POST[pins]', '', '$to_d_id', 'n', '-', 'Transfered', '', '', '');";
        
        //$his_que="INSERT INTO `pin_wallet` (`pw_id`, `date`, `time`, `d_id`, `pin_qty`, `from_d_id`, `to_d_id`, `admin`, `type`, `note`, `req_no`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '$_POST[pins]', '', '$to_d_id', 'n', '-', 'Transfered', '');";
        
        //////////////to d id
        $cd="SELECT * FROM `distributor` WHERE `d_id`='$to_d_id'";
        $sc=$con->query($cd);
        $fet=mysqli_fetch_assoc($sc);
        
        $a_pind=$fet[u_pin_wallet]+$_POST[pins];
        $up_quew="UPDATE `distributor` SET `u_pin_wallet` = '$a_pind' WHERE `distributor`.`d_id` = $to_d_id;";
        
       // $his_quew="INSERT INTO `pin_wallet` (`pw_id`, `date`, `time`, `d_id`, `pin_qty`, `from_d_id`, `to_d_id`, `admin`, `type`, `note`, `req_no`) VALUES (NULL, '$date', '$time', '$to_d_id', '$_POST[pins]', '$_SESSION[d_id]', '', 'n', '+', 'Received', '');";
        $his_quew="INSERT INTO `u_pin_wallet` (`upw_id`, `date`, `time`, `d_id`, `pin_qty`, `from_d_id`, `to_d_id`, `admin`, `type`, `note`, `req_no`, `pin_a_d_id`, `pin_used`) VALUES (NULL, '$date', '$time', '$to_d_id', '$_POST[pins]', '$_SESSION[d_id]', '', 'n', '+', 'Received', '', '', '');";
        
        if($con->query($up_que)===TRUE && $con->query($his_que)===TRUE && $con->query($up_quew)===TRUE && $con->query($his_quew)===TRUE)
        {
            ////////////////////for sending sms
            $message='DS'.$_SESSION[d_id].' You Have Transfer '.$_POST[pins].' Pin to DS'.$to_d_id.' Dreamsway Sure';
            send_sms($d_detail[mobile], $message, 'Pin Transfered', $_SESSION[d_id]);
    		///////////
    		////////////////////for sending sms
            $message='DS'.$_SESSION[d_id].' Your Pin wallet Debited with '.$_POST[pins].' Now Your Pin Wallet is '.$a_pin.', Dreamsway Sure';
            send_sms($d_detail[mobile], $message, 'Pin Wallet', $_SESSION[d_id]);
    		///////////
    		////////////////////for sending sms
            $message='DS'.$to_d_id.' Your Pin Credited with '.$_POST[pins].' Now Your Pin Wallet is '.$a_pind.', Dreamsway Sure';
            send_sms($fet[mobile], $message, 'Pin Transfered', $to_d_id);
    		///////////
            
            echo "<script>alert('Upgrade Pin Transfered sucessfully'); location.href='upin_transfer.php';</script>";
        }
        else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'transfering pi query');";
    	        $con->query($fail);
            echo "<script>alert('Failed ! to transfer pin plz try again'); location.href='upin_transfer.php';</script>";
        }
    }else{ echo "<script>alert('Failed ! You Dont Pins to transfer'); location.href='upin_transfer.php';</script>";
        }
}else{ echo "<script>alert('Failed ! to transfer pin plz try again'); location.href='upin_transfer.php';</script>";
        }
}