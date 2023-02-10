<?php
include "../../../database_connect.php";
/*
$sds="SELECT * FROM `withdrawal_wallet` WHERE `note`='Level Income'";
$sdc=$con->query($sds);
while($ds=$sdc->fetch_assoc())
{  
    $sdsq="SELECT * FROM `withdrawal_wallet` WHERE `note`='Level Income' AND `d_id`='$ds[d_id]' AND `activated_id`='$ds[activated_id]'";
$sdcq=$con->query($sdsq);
if($sdcq->num_rows>1)
{
    echo $ds[activated_id].", ".$ds[date].", ".$ds[amount].", ".$ds[d_id]."<br>";
    $scop=$scop+$ds[amount];
}
}
echo "tot ".$scop;
*/
/*
$dcv="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='1'";
$dcx=$con->query($dcv);
while($dcco=$dcx->fetch_assoc())
{   
    //echo $dcco[amt_id]."<br>";
    $dcve="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$dcco[amt_id]'";
    $dcxe=$con->query($dcve);
    if($dcxe->num_rows>0)
    {
        echo $dcco[amt_id]."f<br>";
    }
}*/


$dcv="SELECT * FROM `auto_matrix_tree` WHERE `id_type`='r' ORDER BY `auto_matrix_tree`.`amt_id` ASC";
$dcx=$con->query($dcv);
while($dcco=$dcx->fetch_assoc())
{   
    echo $dcco[amt_id].", &nbsp;&nbsp;&nbsp;";
    $dcve="SELECT * FROM `auto_matrix_income` WHERE `amt_id`='$dcco[amt_id]' AND `level`='1'";
    $dcxe=$con->query($dcve);
    while($dscccc=$dcxe->fetch_assoc()){
        echo $dscccc[for_amt_id].", &nbsp;&nbsp;&nbsp;";
    }
    echo "<br>";
    
}


?>