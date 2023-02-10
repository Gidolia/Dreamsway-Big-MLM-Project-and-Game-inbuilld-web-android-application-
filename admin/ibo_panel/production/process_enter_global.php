<?php
include "config.php";
$scsc="SELECT * FROM `distributor`";
$dcdc=$con->query($scsc);
while($r=$dcdc->fetch_assoc())
{
    if($r[a_status]=="y"){
        if($r[global_status]!="y"){
            $sa="SELECT * FROM `distributor` WHERE `s_id`='$r[d_id]' AND `a_status`='y'";
            $xx=$con->query($sa);
            $count=$xx->num_rows;
            if($count>=50){
                $update="UPDATE `distributor` SET `global_status` = 'y' WHERE `distributor`.`d_id` = '$r[d_id]';";
                $update  .="UPDATE `distributor` SET `global_entry_date` = '$date' WHERE `distributor`.`d_id` = '$r[d_id]';";
                while ($con->next_result()) {;}
                if($con->multi_query($update)===TRUE)
                {
                    while ($con->next_result()) {;}
                }
                else{
                    $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'placing global id');";
                    while ($con->next_result()) {;}
        	        $con->query($fail);
                }
            }
        }
    }
}
echo "<script>alert('Refreshed Successfully'); location.href='global_income.php';</script>";