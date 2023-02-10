<?php
include "database_connect.php";
$xs="SELECT * FROM `tables`";
$xc=$con->query($xs);
while($id=$xc->fetch_assoc())
{
    $zx="UPDATE `distributor` SET `a_status` = 'n' WHERE `distributor`.`d_id` = '$id[id]';";
    if($con->query($zx)===TRUE)
    {
        
    }
    else{
        echo "Failed".$id[id]."<br>";
    }
}
