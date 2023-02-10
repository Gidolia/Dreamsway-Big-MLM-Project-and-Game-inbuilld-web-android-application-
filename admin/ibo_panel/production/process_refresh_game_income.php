<?php
include "config.php";
//echo $_POST[date];
function for_finding_no_game_play($d_id,$p_date)
{
    global $con;
    $rfvt="SELECT * FROM `game_room_person` WHERE `date`='$p_date' AND `d_id`='$d_id'";
    $cml=$con->query($rfvt);
    $no=$cml->num_rows;
    return $no;
}
//echo for_finding_no_game_play('964182',$_POST[date]);

if(isset($_POST[submit]))
{
$sqlas="SELECT * FROM `distributor` WHERE `a_status`='y'";
$cmp=$con->query($sqlas);
while($d_detail=$cmp->fetch_assoc())
{
    //echo $d_detail[d_id]."d_id<br>";
    $rfvt="SELECT * FROM `game_room_person` WHERE `date`='$_POST[date]' AND `d_id`='$d_detail[d_id]';";
   // echo $rfvt."<br>";
    $cml=$con->query($rfvt);
    while($gal=$cml->fetch_assoc())
    {
        //echo "ds";
        //echo $gal[grp_id];
        $sql="UPDATE `game_room_person` SET `distribute_status` = 'y' WHERE `game_room_person`.`grp_id` = '$gal[grp_id]';";
        //////////////////////////////////level 1
         $lsql1="SELECT * FROM `distributor` WHERE `d_id`='$d_detail[s_id]'";
         $que1=$con->query($lsql1);
         $fet1=mysqli_fetch_assoc($que1);
         $coin_bal1=$fet1[ludo_wallet]+10; 
         if(for_finding_no_game_play($fet1[d_id],$_POST[date])>0)
         {
         $sql .="UPDATE `distributor` SET `ludo_wallet` = '$coin_bal1' WHERE `distributor`.`d_id` = '$fet1[d_id]';";
         //$sql .="INSERT INTO `ludo_wallet_history` (`lch_id`, `d_id`, `coin`, `type`, `a_coin`, `date`, `time`, `note`, `activated_id`) VALUES (NULL, '$fet1[d_id]', '10', '+', '$coin_bal1', '$date', '$time', 'game play income', '$_SESSION[d_id]');";
         $sql .="INSERT INTO `ludo_wallet_history` (`lwh_id`, `d_id`, `date`, `time`, `coin`, `a_coin`, `note`, `activated_d_id`, `level`, `type`) VALUES (NULL, '$fet1[d_id]', '$date', '$time', '10', '$coin_bal1', 'Game Play Income', '$d_detail[d_id]', '1', '+');";
         
         }
         //////////////////////////////////level 2
         $lsql2="SELECT * FROM `distributor` WHERE `d_id`='$fet1[s_id]'";
         $que2=$con->query($lsql2);
         $fet2=mysqli_fetch_assoc($que2);
         $coin_bal2=$fet2[ludo_wallet]+10;
         if(for_finding_no_game_play($fet2[d_id],$_POST[date])>0)
         {
         $sql .="UPDATE `distributor` SET `ludo_wallet` = '$coin_bal2' WHERE `distributor`.`d_id` = '$fet2[d_id]';";
         $sql .="INSERT INTO `ludo_wallet_history` (`lwh_id`, `d_id`, `date`, `time`, `coin`, `a_coin`, `note`, `activated_d_id`, `level`, `type`) VALUES (NULL, '$fet2[d_id]', '$date', '$time', '10', '$coin_bal2', 'Game Play Income', '$d_detail[d_id]', '2', '+');";
         }
         //////////////////////////////////level 3
         $lsql3="SELECT * FROM `distributor` WHERE `d_id`='$fet2[s_id]'";
         $que3=$con->query($lsql3);
         $fet3=mysqli_fetch_assoc($que3);
         $coin_bal3=$fet3[ludo_wallet]+20;
         if(for_finding_no_game_play($fet3[d_id],$_POST[date])>0)
         {
         $sql .="UPDATE `distributor` SET `ludo_wallet` = '$coin_bal3' WHERE `distributor`.`d_id` = '$fet3[d_id]';";
         $sql .="INSERT INTO `ludo_wallet_history` (`lwh_id`, `d_id`, `date`, `time`, `coin`, `a_coin`, `note`, `activated_d_id`, `level`, `type`) VALUES (NULL, '$fet3[d_id]', '$date', '$time', '20', '$coin_bal3', 'Game Play Income', '$d_detail[d_id]', '3', '+');";
         }
          //////////////////////////////////level 4
         $lsql4="SELECT * FROM `distributor` WHERE `d_id`='$fet3[s_id]'";
         $que4=$con->query($lsql4);
         $fet4=mysqli_fetch_assoc($que4);
         $coin_bal4=$fet4[ludo_wallet]+20;
         if(for_finding_no_game_play($fet4[d_id],$_POST[date])>0)
         {
         $sql .="UPDATE `distributor` SET `ludo_wallet` = '$coin_bal4' WHERE `distributor`.`d_id` = '$fet4[d_id]';";
         $sql .="INSERT INTO `ludo_wallet_history` (`lwh_id`, `d_id`, `date`, `time`, `coin`, `a_coin`, `note`, `activated_d_id`, `level`, `type`) VALUES (NULL, '$fet4[d_id]', '$date', '$time', '20', '$coin_bal4', 'Game Play Income', '$d_detail[d_id]', '4', '+');";
         }
           //////////////////////////////////level 5
         $lsql5="SELECT * FROM `distributor` WHERE `d_id`='$fet4[s_id]'";
         $que5=$con->query($lsql5);
         $fet5=mysqli_fetch_assoc($que5);
         $coin_bal5=$fet5[ludo_wallet]+30;
         if(for_finding_no_game_play($fet5[d_id],$_POST[date])>0)
         {
         $sql .="UPDATE `distributor` SET `ludo_wallet` = '$coin_bal5' WHERE `distributor`.`d_id` = '$fet5[d_id]';";
         $sql .="INSERT INTO `ludo_wallet_history` (`lwh_id`, `d_id`, `date`, `time`, `coin`, `a_coin`, `note`, `activated_d_id`, `level`, `type`) VALUES (NULL, '$fet5[d_id]', '$date', '$time', '30', '$coin_bal5', 'Game Play Income', '$d_detail[d_id]', '5', '+');";
         }
            //////////////////////////////////level 6
         $lsql6="SELECT * FROM `distributor` WHERE `d_id`='$fet5[s_id]'";
         $que6=$con->query($lsql6);
         $fet6=mysqli_fetch_assoc($que6);
         $coin_bal6=$fet6[ludo_wallet]+30;
         if(for_finding_no_game_play($fet1[d_id],$_POST[date])>0)
         {
         $sql .="UPDATE `distributor` SET `ludo_wallet` = '$coin_bal6' WHERE `distributor`.`d_id` = '$fet5[d_id]';";
         $sql .="INSERT INTO `ludo_wallet_history` (`lwh_id`, `d_id`, `date`, `time`, `coin`, `a_coin`, `note`, `activated_d_id`, `level`, `type`) VALUES (NULL, '$fet6[d_id]', '$date', '$time', '30', '$coin_bal6', 'Game Play Income', '$d_detail[d_id]', '6', '+');";
         }
         //echo "success";
         while ($con->next_result()) {;}
         if($con->multi_query($sql)===TRUE)
         {
             unset($sql);
             while ($con->next_result()) {;}
             echo "success <br>";
         }
         else{echo "fail<br>";}
    }
    
}
}