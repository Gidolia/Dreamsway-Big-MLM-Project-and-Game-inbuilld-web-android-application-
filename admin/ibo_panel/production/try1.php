<?php
include "config.php";

$dcd="SELECT * FROM `auto_matrix_tree` ORDER BY `auto_matrix_tree`.`amt_id` ASC";
$dv=$con->query($dcd);
while($dvv=$dv->fetch_assoc())
{
    echo $dvv[amt_id];
    $dcds="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$dvv[amt_id]' ORDER BY `auto_matrix_tree`.`amt_id` ASC";
    $dvs=$con->query($dcds);
    while($dvvs=$dvs->fetch_assoc())
    {
        echo " lv1->".$dvvs[amt_id];
    }
    echo "<br>";
}/*
$dcd="SELECT * FROM `dummy_auto_matrix_id`";
$dv=$con->query($dcd);
while($dvv=$dv->fetch_assoc())
{
    echo $dvv[dam_id];
    $dcds="SELECT * FROM `dummy_auto_matrix_id` WHERE `s_id`='$dvv[dam_id]'";
    $dvs=$con->query($dcds);
    while($dvvs=$dvs->fetch_assoc())
    {
        echo " lv1->".$dvvs[dam_id];
    }
    echo "<br>";
}
