<?php
//include "u_runner_rebirth_function.php";
///////////////////////////////////////////////function for finding last all s_id
function find_last_s_id_d_id_bronze_tree($bt_id)
{
    global $con;
    $temp=array();
    $temp1=array();
    $sql="SELECT * FROM `bronze_tree` WHERE `bt_id`='$bt_id'";
    $que=$con->query($sql);
    if ($que->num_rows > 0){
     $qs=$que->fetch_assoc();
    ///////////////////////////level 1
    $sql1="SELECT * FROM `bronze_tree` WHERE `s_id`='$qs[bt_id]';";
    $que1=$con->query($sql1);
    if ($que1->num_rows >= 3){
        while($qs1=$que1->fetch_assoc())
        {
            $temp[]=$qs1[bt_id];
        }
       // echo "Level 1<br>";
    }
    else{$s_idd=$qs[bt_id];
    $stop=1;
       // echo "stop1";
    }
    /////////////////////////////////////level 2
    if(count($temp)>0)
    {
        for($x=0; $x<count($temp); $x++)
    	{
    	    if($stop!=1)
    	    {
                $sql1="SELECT * FROM `bronze_tree` WHERE `s_id`='$temp[$x]';";
                $que1=$con->query($sql1);
                if ($que1->num_rows >= 3) {
                    while($qs1=$que1->fetch_assoc())
                    {
                        $temp1[]=$qs1[bt_id];
                      // echo $qs1[d_id];
                    }
                    //echo "Level 2<br>";
                }
                else{$s_idd=$temp[$x];
                    $stop=1;
                   // echo "stop2";
                }
    	    }
    	}
    }
    unset($temp);
    $temp=array();
    for($t=0; $t<50; $t++)
    {
        if($stop!=1)
        {
            //echo "55";
        if(count($temp1)>0)
        {
            for($x=0; $x<count($temp1); $x++)
        	{
        	    if($stop!=1)
        	    {
                    $sql1="SELECT * FROM `bronze_tree` WHERE `s_id`='$temp1[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 3) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp[]=$qs1[bt_id];
                            //echo $qs1[d_id];
                        }
                         //echo "Level 3<br>";
                    }
                    else{$s_idd=$temp1[$x];
                        $stop=1;
                        //echo $temp1[$x];
                        //echo "stop3";
                    }
        	    }
        	}
        }
        unset($temp1);
        $temp1=array();
        if(count($temp)>0)
        {
            for($x=0; $x<count($temp); $x++)
        	{
        	    if($stop!=1)
        	    {
                    $sql1="SELECT * FROM `bronze_tree` WHERE `s_id`='$temp[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 3) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp1[]=$qs1[bt_id];
                        }
                    }
                    else{$s_idd=$temp[$x];
                        $stop=1;
                        //echo "stop4";
                    }
        	    }
        	}
        }
        unset($temp);
        $temp=array();
        }
    }
 }else{$s_idd=find_last_s_id_all_bronze_tree();}
    return $s_idd;
}

////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
function find_last_s_id_all_bronze_tree()
{
    global $con;
    $temp=array();
    $temp1=array();
    $sql="SELECT * FROM `bronze_tree` ORDER BY `bt_id` ASC";
 $que=$con->query($sql);
 if ($que->num_rows > 0) {
     $qs=$que->fetch_assoc();
     //echo $qs[d_id];
    ///////////////////////////level 1
    $sql1="SELECT * FROM `bronze_tree` WHERE `s_id`='$qs[bt_id]';";
    $que1=$con->query($sql1);
    if ($que1->num_rows >= 3) {
        while($qs1=$que1->fetch_assoc())
        {
            $temp[]=$qs1[bt_id];
        }
       // echo "Level 1<br>";
    }
    else{$s_idd=$qs[bt_id];
    $stop=1;
       // echo "stop1";
    }
    
    /////////////////////////////////////level 2
    
    if(count($temp)>0)
    {
        for($x=0; $x<count($temp); $x++)
    	{
    	    if($stop!=1)
    	    {
                $sql1="SELECT * FROM `bronze_tree` WHERE `s_id`='$temp[$x]';";
                $que1=$con->query($sql1);
                if ($que1->num_rows >= 3) {
                    while($qs1=$que1->fetch_assoc())
                    {
                        $temp1[]=$qs1[bt_id];
                      // echo $qs1[d_id];
                    }
                    //echo "Level 2<br>";
                }
                else{$s_idd=$temp[$x];
                    $stop=1;
                   // echo "stop2";
                }
    	    }
    	}
    }
    unset($temp);
    $temp=array();
    for($t=0; $t<50; $t++)
    {
        if($stop!=1)
        {
            //echo "55";
        if(count($temp1)>0)
        {
            for($x=0; $x<count($temp1); $x++)
        	{
        	    if($stop!=1)
        	    {
                    $sql1="SELECT * FROM `bronze_tree` WHERE `s_id`='$temp1[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 3) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp[]=$qs1[bt_id];
                            //echo $qs1[d_id];
                        }
                         //echo "Level 3<br>";
                    }
                    else{$s_idd=$temp1[$x];
                        $stop=1;
                        //echo $temp1[$x];
                        //echo "stop3";
                    }
        	    }
        	}
        }
        unset($temp1);
        $temp1=array();
        if(count($temp)>0)
        {
            for($x=0; $x<count($temp); $x++)
        	{
        	    if($stop!=1)
        	    {
                    $sql1="SELECT * FROM `bronze_tree` WHERE `s_id`='$temp[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 3) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp1[]=$qs1[bt_id];
                        }
                    }
                    else{$s_idd=$temp[$x];
                        $stop=1;
                        //echo "stop4";
                    }
        	    }
        	}
        }
        unset($temp);
        $temp=array();
        }
    }
 }else{$s_idd=0;}
    return $s_idd;
}
////////////////////
/////////////////////////////
/////////////////////////////////////////
/////////////////////////////////////////////////////
function for_finding_upline_upgrade_d_id($d_id)
{
    global $con, $date, $time;
    $u_d_id=array();
    $sql="SELECT d_id,s_id,u_status FROM `distributor` WHERE `d_id`='$d_id'";
    $que=$con->query($sql);
    $fet=$que->fetch_assoc();
    /////////////
    ////////////////////
    //$a=0;
    for($t=0; $t<80; $t++)
    {
        $sql="SELECT d_id,s_id,u_status FROM `distributor` WHERE `d_id`='$fet[s_id]'";
        $que=$con->query($sql);
        if($que->num_rows>=1)
        {
            $fet=$que->fetch_assoc();
            $fet[d_id];
            if($fet[u_status]=='y')
            {
                //echo $fet[d_id];
                $u_d_id[]=$fet[d_id];
            }
        }else{
            break;
        }
        //$a++;
        //echo "c".$a."<br>";
    }
    if($u_d_id[0]!="")
    {
        return $u_d_id[0];
    }
    else{return "id not founded";}
}
///////////////////////////
////////////////////////////////////
////////////////////////////////////////////////////
function for_finding_bronze_12completed_id($bt_id)
{
    global $con,$date,$time;
    $fcd="SELECT * FROM `bronze_tree` WHERE `bt_id`='$bt_id'";
    $que=$con->query($fcd);
    
    ////////////////////level 1 check 3 id
    $a=0;
    $sql="SELECT * FROM `bronze_tree` WHERE `s_id`='$bt_id'";
    $quet=$con->query($sql);
    while($er=$quet->fetch_assoc())
    {
        $a++;
        $sql1="SELECT * FROM `bronze_tree` WHERE `s_id`='$er[bt_id]'";
        $quet1=$con->query($sql1);
        while($er1=$quet1->fetch_assoc())
        {
            $a++;
        }
    }
    if($a>=12){
        return '1';
    }
    else{return '0';}
}
////////////////////////
////////////////////////////////
///////////////////////////////////////////
function for_finding_placement_rebirth_id($d_id){
    global $con, $date, $time;
    $mnyh="SELECT * FROM `bronze_tree` WHERE `d_id`='$d_id'";
    $xm=$con->query($mnyh);
    $vc=for_finding_upline_upgrade_d_id($d_id);
    if($vc=="id not founded"){
    $d=find_last_s_id_all_bronze_tree();
    //echo "if";
    }else{
        //echo "else";
        $v="select max(bt_id) as max from bronze_tree where d_id='$vc';";
        $cdv=$con->query($v);
        $cvbnm=$cdv->fetch_assoc();
        //echo $cvbnm[max];
        $d=find_last_s_id_d_id_bronze_tree($cvbnm[max]);
    }
    $vvc="select max(bt_id) as mayx from bronze_tree where d_id='$d_id';";
        $cdvvc=$con->query($vvc);
        $cvbnmvc=$cdvvc->fetch_assoc();
   // echo $vc." d_id<br>";
   // echo $d." bt_s_id<br>";
   if(for_finding_bronze_12completed_id($cvbnmvc[mayx])==1)
   {
   $hvgv="UPDATE `bronze_tree` SET `status_of_12_c` = 'y' WHERE `bronze_tree`.`bt_id` = '$cvbnmvc[mayx]';";
    $ccc="INSERT INTO `bronze_tree` (`bt_id`, `s_id`, `d_id`, `e_date`, `e_time`, `rebirth_id`, `status_of_12_c`, `rebirth_from_bt_id`) VALUES (NULL, '$d', '$d_id', '$date', '$time', 'y', 'n', '$cvbnmvc[mayx]');";
    if($con->query($ccc)===TRUE && $con->query($hvgv)===TRUE){
        ////////////////////////////for entering in runner tree
        $dert="SELECT * FROM `runner_tree` WHERE `d_id`='$d_id'";
        $swert=$con->query($dert);
        if($swert->num_rows==0)
        {
            for_finally_entering_runner_id($d_id);
        }
        ////////////////////for distributing income rebirth bronze tree
        $sqlxs="SELECT max(bt_id) as mnb FROM `bronze_tree`";
                $scxs=$con->query($sqlxs);
                $ssxs=$scxs->fetch_assoc();
            for_distributing_income_rebirth_id_bronze_club_tree($ssxs[mnb]);
        echo "Success";
    }
    else{$fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'rebirth function fail');";
    	        $con->query($fail);}
   }else{echo "last bt_id doesnot complete 12 structure";}
}


////////////////
//////////////////////////
/////////////////////////////////////
function for_distributing_income_bronze_club_tree($bt_id)
{
    global $con, $date, $time;
    $btsql="SELECT * FROM `bronze_tree` WHERE `bt_id`='$bt_id'";
    $btque=$con->query($btsql);
    $btfet=$btque->fetch_assoc();
   // echo $btsql;
    /////////////////////// level 1    150/-
    $btsql1="SELECT * FROM `bronze_tree` WHERE `bt_id`='$btfet[s_id]'";
    $btque1=$con->query($btsql1);
    if($btque1->num_rows>0)
    {
        $btfet1=$btque1->fetch_assoc();
        $didsql="SELECT * FROM `distributor` WHERE `d_id`='$btfet1[d_id]'";
        $didque=$con->query($didsql);
        $didfet=$didque->fetch_assoc();
        $iw_wallet=$didfet[withdrawal_wallet]+150;
        echo "lv1".$didfet[withdrawal_wallet].",".$iw_wallet."<br>";
        $sqlj="UPDATE `distributor` SET `withdrawal_wallet` = '$iw_wallet' WHERE `distributor`.`d_id` = '$btfet1[d_id]';";
        $sqa="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$btfet1[d_id]', '$date', '$time', '+', '150', '$iw_wallet', 'Bronze Club Income', 'Bronze Club Level', '', '', '$btfet[d_id]', '1', 'Bronze Tree', '');";
        $sxxb="INSERT INTO `upgrade_income_on_income` (`uioi_id`, `d_id`, `date`, `time`, `club`, `status`, `amount`, `activated_d_id`) VALUES (NULL, '$btfet1[d_id]', '$date', '$time', 'Bronze', 'n', '150', '$bt_id');";
        if($con->query($sqlj)===TRUE && $con->query($sqa)===TRUE && $con->query($sxxb)===TRUE)
        { }else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Bronze tree income distribution lv1');";
	        $con->query($fail);
        }
    }
    /////////////////////// level 2 400/-
    $btsql2="SELECT * FROM `bronze_tree` WHERE `bt_id`='$btfet1[s_id]'";
    $btque2=$con->query($btsql2);
    if($btque2->num_rows>0)
    {
        $btfet2=$btque2->fetch_assoc();
        $didsql2="SELECT * FROM `distributor` WHERE `d_id`='$btfet2[d_id]'";
        $didque2=$con->query($didsql2);
        $didfet2=$didque2->fetch_assoc();
        $iw_wallet2=$didfet2[withdrawal_wallet]+400;
        echo "lv2".$didfet2[withdrawal_wallet].",".$iw_wallet2;
        $sqlj2="UPDATE `distributor` SET `withdrawal_wallet` = '$iw_wallet2' WHERE `distributor`.`d_id` = '$btfet2[d_id]';";
        $sqa2="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$btfet2[d_id]', '$date', '$time', '+', '400', '$iw_wallet2', 'Bronze Club Income', 'Bronze Club Level', '', '', '$btfet[d_id]', '2', 'Bronze Tree', '');";
        $sxxb2="INSERT INTO `upgrade_income_on_income` (`uioi_id`, `d_id`, `date`, `time`, `club`, `status`, `amount`, `activated_d_id`) VALUES (NULL, '$btfet2[d_id]', '$date', '$time', 'Bronze', 'n', '400', '$bt_id');";
        if($con->query($sqlj2)===TRUE && $con->query($sqa2)===TRUE && $con->query($sxxb2)===TRUE)
        { }else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Bronze tree income distribution lv2');";
	        $con->query($fail);
        }
    }
}
//////////////////////
/////////////////////////////
///////////////////////////////////////
////////////////
//////////////////////////
/////////////////////////////////////
function for_distributing_income_rebirth_id_bronze_club_tree($bt_id)
{
    global $con, $date, $time;
    $btsql="SELECT * FROM `bronze_tree` WHERE `bt_id`='$bt_id'";
    $btque=$con->query($btsql);
    $btfet=$btque->fetch_assoc();
   // echo $btsql;
    /////////////////////// level 1    150/-
    $btsql1="SELECT * FROM `bronze_tree` WHERE `bt_id`='$btfet[s_id]'";
    $btque1=$con->query($btsql1);
    if($btque1->num_rows>0)
    {
        $btfet1=$btque1->fetch_assoc();
        $didsql="SELECT * FROM `distributor` WHERE `d_id`='$btfet1[d_id]'";
        $didque=$con->query($didsql);
        $didfet=$didque->fetch_assoc();
        $iw_wallet=$didfet[withdrawal_wallet]+150;
        echo "lv1".$didfet[withdrawal_wallet].",".$iw_wallet."<br>";
        $sqlj="UPDATE `distributor` SET `withdrawal_wallet` = '$iw_wallet' WHERE `distributor`.`d_id` = '$btfet1[d_id]';";
        $sqa="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$btfet1[d_id]', '$date', '$time', '+', '150', '$iw_wallet', 'Bronze Club Income', 'Bronze Club Rebirth', '', '', '$btfet[d_id]', '1', 'Bronze Tree', '');";
        $sxxb="INSERT INTO `upgrade_income_on_income` (`uioi_id`, `d_id`, `date`, `time`, `club`, `status`, `amount`, `activated_d_id`) VALUES (NULL, '$btfet1[d_id]', '$date', '$time', 'Bronze Rebirth', 'n', '150', '$bt_id');";
        if($con->query($sqlj)===TRUE && $con->query($sqa)===TRUE && $con->query($sxxb)===TRUE)
        { }else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Bronze tree income distribution lv1');";
	        $con->query($fail);
        }
    }
    /////////////////////// level 2 400/-
    $btsql2="SELECT * FROM `bronze_tree` WHERE `bt_id`='$btfet1[s_id]'";
    $btque2=$con->query($btsql2);
    if($btque2->num_rows>0)
    {
        $btfet2=$btque2->fetch_assoc();
        $didsql2="SELECT * FROM `distributor` WHERE `d_id`='$btfet2[d_id]'";
        $didque2=$con->query($didsql2);
        $didfet2=$didque2->fetch_assoc();
        $iw_wallet2=$didfet2[withdrawal_wallet]+400;
        echo "lv2".$didfet2[withdrawal_wallet].",".$iw_wallet2;
        $sqlj2="UPDATE `distributor` SET `withdrawal_wallet` = '$iw_wallet2' WHERE `distributor`.`d_id` = '$btfet2[d_id]';";
        $sqa2="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$btfet2[d_id]', '$date', '$time', '+', '400', '$iw_wallet2', 'Bronze Club Income', 'Bronze Club Rebirth', '', '', '$btfet[d_id]', '2', 'Bronze Tree', '');";
        $sxxb2="INSERT INTO `upgrade_income_on_income` (`uioi_id`, `d_id`, `date`, `time`, `club`, `status`, `amount`, `activated_d_id`) VALUES (NULL, '$btfet2[d_id]', '$date', '$time', 'Bronze Rebirth', 'n', '400', '$bt_id');";
        if($con->query($sqlj2)===TRUE && $con->query($sqa2)===TRUE && $con->query($sxxb2)===TRUE)
        { }else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Bronze tree income distribution lv2');";
	        $con->query($fail);
        }
    }
}
//////////////////////
/////////////////////////////
///////////////////////////////////////

function for_finding_placement_id($d_id){
    global $con, $date, $time;
    $mnyh="SELECT * FROM `bronze_tree` WHERE `d_id`='$d_id'";
    $xm=$con->query($mnyh);
    if($xm->num_rows==0)
    {
    $vc=for_finding_upline_upgrade_d_id($d_id);
    if($vc=="id not founded"){
    $d=find_last_s_id_all_bronze_tree();
    //echo "if";
    }else{
        //echo "else";
        $v="select max(bt_id) as max from bronze_tree where d_id='$vc';";
        $cdv=$con->query($v);
        $cvbnm=$cdv->fetch_assoc();
        //echo $cvbnm[max];
        $d=find_last_s_id_d_id_bronze_tree($cvbnm[max]);
    }
    echo $vc." d_id<br>";
    echo $d." bt_s_id<br>";
    $vcvvvv="UPDATE `distributor` SET `u_status` = 'y' WHERE `distributor`.`d_id` = '$d_id';";
    $cxxxs="UPDATE `distributor` SET `rebirth_times` = '0' WHERE `distributor`.`d_id` = '$d_id';";
    $ccc="INSERT INTO `bronze_tree` (`bt_id`, `s_id`, `d_id`, `e_date`, `e_time`, `rebirth_id`, `status_of_12_c`, `rebirth_from_bt_id`, `income_distributed`) VALUES (NULL, '$d', '$d_id', '$date', '$time', 'n', 'n', '', 'n');";
    
    if($con->query($ccc)===TRUE && $con->query($vcvvvv)===TRUE && $con->query($cxxxs)===TRUE){
            $sqlxs="SELECT max(bt_id) as mnb FROM `bronze_tree`";
            $scxs=$con->query($sqlxs);
            $ssxs=$scxs->fetch_assoc();
        for_distributing_income_bronze_club_tree($ssxs[mnb]);
       echo "success";
    }
    else{echo "fail";}
    }
}
//////////////////////////////////
/////////////////////////////////////////////////
function for_finally_entering_bronze_id($d_id)
{
    global $con,$date,$time;
    $cddsvc="SELECT * FROM `bronze_tree` WHERE `d_id`='$d_id'";
    $sxmkj=$con->query($cddsvc);
    if($sxmkj->num_rows==0)
    {
    /////////////////////////for entering rebirth id
    $fvv="SELECT * FROM `bronze_tree` WHERE `status_of_12_c`='n'";
    $xmn=$con->query($fvv);
    while($xmnn=$xmn->fetch_assoc())
    {
        echo $xmnn[bt_id]." c= ".for_finding_bronze_12completed_id($xmnn[bt_id])." ,".$xmnn[d_id]."<br>";
        if(for_finding_bronze_12completed_id($xmnn[bt_id])=='1')
        {
            for_finding_placement_rebirth_id($xmnn[d_id]);
        }
    }
        ///////////////////////////////////for new id
     for_finding_placement_id($d_id);
     u_insert_d_id($d_id);
         /////////////////////////for entering rebirth id
    $fvv="SELECT * FROM `bronze_tree` WHERE `status_of_12_c`='n'";
    $xmn=$con->query($fvv);
    while($xmnn=$xmn->fetch_assoc())
    {
        echo $xmnn[bt_id]." c= ".for_finding_bronze_12completed_id($xmnn[bt_id])." ,".$xmnn[d_id]."<br>";
        if(for_finding_bronze_12completed_id($xmnn[bt_id])=='1')
        {
            for_finding_placement_rebirth_id($xmnn[d_id]);
        }
    }
    }else{echo "already activated";}
}
//echo find_last_s_id_all_bronze_tree();
//echo for_finding_upline_upgrade_d_id(2);
//echo find_last_s_id_d_id_bronze_tree(7);
//echo for_finding_bronze_12completed_id(2);
//echo for_finding_placement_id(1);

?>
iuj