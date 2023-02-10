<?php
include "config.php";
if(isset($_POST[distri_silver_submit]))
{
    $fd="SELECT * FROM `silver_tree` WHERE `rebirth_id`='n'";
    $ccccccc=$con->query($fd);
    $count=$ccccccc->num_rows;
    if($count>0)
    {
        $per_m_amount=$_POST[amount]/$count;
        $per_m_amount= number_format($per_m_amount, 3, '.', '');
        
        $r="INSERT INTO `silver_rank_rnr_income` (`srrnri_id`, `date`, `time`, `total_amount`, `per_person_amount`, `total_person`, `unq_id`) VALUES (NULL, '$date', '$time', '$_POST[amount]', '$per_m_amount', '$count', '');";
        while($ad=$ccccccc->fetch_assoc())
        {
            $sxm="SELECT * FROM `distributor` WHERE `d_id`='$ad[d_id]'";
            $sdxxx=$con->query($sxm);
            $aa=$sdxxx->fetch_assoc();
            $wallet=$aa[withdrawal_wallet]+$per_m_amount;
            $r .="UPDATE `distributor` SET `withdrawal_wallet` = '$wallet' WHERE `distributor`.`d_id` = '$aa[d_id]';";
            $r .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$aa[d_id]', '$date', '$time', '+', '$per_m_amount', '$wallet', 'R&R Income Silver Rank', 'R&R Income Silver Rank', '', '', '', '');";
            $r .="INSERT INTO `silver_rank_rnr_income_id` (`srrnriid_id`, `unq_id`, `d_id`, `date`, `time`, `amount`, `total_distributed_amount`) VALUES (NULL, '', '$aa[d_id]', '$date', '$time', '$per_m_amount', '$_POST[amount]');";
            
        }
        if($con->multi_query($r)===TRUE)
                {
                	echo "<script>alert('Amount Distributed Successfully');
		location.href='distribute_silver_rank_rnr.php';</script>";
                }
                else{
                    $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'R&R silver Rank Income Distribute');";
                
    	        $con->query($fail);
    	        echo "<script>alert('Failed ! Plz contact Your Developer');
		location.href='distribute_silver_rank_rnr.php';</script>";
                }
    }
    echo "<script>alert('Amount Distributed Successfully');
		location.href='distribute_silver_rank_rnr.php';</script>";
}