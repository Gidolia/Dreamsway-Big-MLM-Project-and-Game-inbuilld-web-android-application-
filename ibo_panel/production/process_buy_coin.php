<?php
include "config.php";
$amount=$_POST[coins]/10;
$coin_bal=$d_detail[ludo_coin]+$_POST[coins];
$main_wallet=$d_detail[main_wallet]-$amount;
if($main_wallet>0)
{
///////////////////////////for buy coin history
$sql="INSERT INTO `game_buy_p_coin_history` (`gbpch_id`, `d_id`, `date`, `time`, `coin`, `amount`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '$_POST[coins]', '$amount');";
///////////////////////for main wallet
$mwr="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `recharge_unq_id`) VALUES (NULL, '$_SESSION[d_id]', '-', '$amount', '$main_wallet', 'Purchase Playing Coin', '', '', 'Purchase Playing Coin', '$date', '$time', '');";
$mwr_up="UPDATE `distributor` SET `main_wallet` = '$main_wallet' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
///////////////////////////for playing coin wallet
$pw="INSERT INTO `ludo_coin_history` (`lch_id`, `d_id`, `coin`, `type`, `a_coin`, `date`, `time`, `note`, `activated_id`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[coins]', '+', '$coin_bal', '$date', '$time', 'Purchased', '');";
$pw_h="UPDATE `distributor` SET `ludo_coin` = '$coin_bal' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
    if($con->query($sql)===TRUE && $con->query($mwr)===TRUE && $con->query($mwr_up)===TRUE && $con->query($pw)===TRUE && $con->query($pw_h)===TRUE){
        echo "<script>alert('Success! coin purchased successfully'); location.href='game_generate_coin.php';</script>";
    }
    else{
        echo "<script>alert('Failed! Plz try again'); location.href='game_generate_coin.php';</script>";
    }
}else{
        echo "<script>alert('Failed! You dont Have Balance'); location.href='game_generate_coin.php';</script>";
    }
    