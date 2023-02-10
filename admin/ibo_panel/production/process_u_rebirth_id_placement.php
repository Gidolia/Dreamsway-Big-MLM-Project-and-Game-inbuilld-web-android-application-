<?php
include "config.php";
include "u_rebirth_function.php";
$fvv="SELECT * FROM `bronze_tree` WHERE `status_of_12_c`='n'";
$xmn=$con->query($fvv);
while($xmnn=$xmn->fetch_assoc())
{
    
    echo $xmnn[bt_id]." c= ".for_finding_bronze_12completed_id($xmnn[bt_id])." ,".$xmnn[d_id]."<br>";
    if(for_finding_bronze_12completed_id($xmnn[bt_id])=='1')
    {
        for_finding_placement_rebirth_id($xmnn[d_id]);
        $sqlxs="SELECT max(bt_id) as mnb FROM `bronze_tree`";
            $scxs=$con->query($sqlxs);
            $ssxs=$scxs->fetch_assoc();
        for_distributing_income_bronze_club_tree($ssxs[mnb]);
    }
}echo "<script>alert('Refreshed Successfully');
		location.href='bronze_tree.php';</script>";