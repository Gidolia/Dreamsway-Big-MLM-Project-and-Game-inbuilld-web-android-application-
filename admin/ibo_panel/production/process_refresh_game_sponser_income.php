<?php
include "config.php";
if(isset($_POST[submit]))
{
    $sqlll="SELECT * FROM `ludo_wallet_history` WHERE `date`='$_POST[date]' AND `note`='Game Play Income' AND `level`='1'";
    $sq=$con->query($sqlll);
    if($sq->num_rows>0)
    {
        while($vf=$sq->fetch_assoc())
        {
            $sqlasw="SELECT * FROM `distributor` WHERE `d_id`='$vf[d_id]'";
            $dl=$con->query($sqlasw);
            $fet=$dl->fetch_assoc();
            $sqlasw1="SELECT * FROM `distributor` WHERE `d_id`='$fet[s_id]'";
            $dl1=$con->query($sqlasw1);
            $fet1=$dl1->fetch_assoc();
            $coin_bal1=$fet1[ludo_wallet]+$vf[coin];
            $sql_up="UPDATE `distributor` SET `ludo_wallet` = '$coin_bal1' WHERE `distributor`.`d_id` = '$fet1[d_id]';";
            
            $sql_ins="INSERT INTO `ludo_wallet_history` (`lwh_id`, `d_id`, `date`, `time`, `coin`, `a_coin`, `note`, `activated_d_id`, `level`, `type`) VALUES (NULL, '$fet1[d_id]', '$date', '$time', '$vf[coin]', '$coin_bal1', 'Game Sponser Income', '$fet[d_id]', '', '+');";
            
            $dcpp="INSERT INTO `game_sponser_income` (`gsi_id`, `d_id`, `date`, `time`, `of_d_id`, `amount`) VALUES (NULL, '$fet1[d_id]', '$date', '$time', '$fet[d_id]', '$vf[coin]');";
            
            if($con->query($sql_up)===TRUE && $con->query($sql_ins)===TRUE && $con->query($dcpp)===TRUE){
                echo "Success";
            }else{
                echo "Fail";
            }
        }
    echo "<script>alert('Amount Distributed Successfully');
		location.href='refresh_game_sponser_income.php';</script>";
}
}
?>