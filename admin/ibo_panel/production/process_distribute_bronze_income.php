<?php
include "config.php";
include "u_rebirth_function.php";
$fvv="SELECT * FROM `bronze_tree` WHERE `income_distributed`='n'";
$xmn=$con->query($fvv);
while($xmnn=$xmn->fetch_assoc())
{

    
    $sql="UPDATE `bronze_tree` SET `income_distributed` = 'y' WHERE `bronze_tree`.`bt_id` = '$xmnn[bt_id]';";
    if($con->query($sql)===TRUE)
    {
    for_distributing_income_bronze_club_tree($xmnn[bt_id]);
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Bronze tree income distribution update query');";
	        $con->query($fail);
        
    }
    
}
//echo "asf";
 
//echo "<script>alert('Refreshed Successfully');
		//location.href='bronze_tree.php';</script>";if