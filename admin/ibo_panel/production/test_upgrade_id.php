<?php 
include "config.php";
include "u_rebirth_function.php";
include "u_function.php";
include "u_runner_rebirth_function.php";
include "u_silver_rebirth_function.php";
include "u_gold_rebirth_function.php";
$dccdd="SELECT * FROM `distributor` WHERE `u_status`='n'";
//echo $dccdd;
$dcfd=$con->query($dccdd);
$a=0;
while($fv=$dcfd->fetch_assoc())
{
    echo $fv[d_id]."<br>";
    //for_finally_entering_bronze_id($fv[d_id]);
    /*$a++;
    if($a<12)
    {
    for_finding_placement_id($fv[d_id]);
    u_insert_d_id($fv[d_id]);
     /////////////////////////for entering rebirth id
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
    }
    }else{break;}*/
}