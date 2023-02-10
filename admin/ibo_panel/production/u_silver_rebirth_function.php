<?php 
//include "config.php";
function find_last_s_id_d_id_silver_tree($st_id)
{
    global $con;
    $temp=array();
    $temp1=array();
    $sql="SELECT * FROM `silver_tree` WHERE `st_id`='$st_id'";
    $que=$con->query($sql);
    if ($que->num_rows > 0){
     $qs=$que->fetch_assoc();
    ///////////////////////////level 1
    $sql1="SELECT * FROM `silver_tree` WHERE `s_id`='$qs[st_id]';";
    $que1=$con->query($sql1);
    if ($que1->num_rows >= 3){
        while($qs1=$que1->fetch_assoc())
        {
            $temp[]=$qs1[st_id];
        }
       // echo "Level 1<br>";
    }
    else{$s_idd=$qs[st_id];
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
                $sql1="SELECT * FROM `silver_tree` WHERE `s_id`='$temp[$x]';";
                $que1=$con->query($sql1);
                if ($que1->num_rows >= 3) {
                    while($qs1=$que1->fetch_assoc())
                    {
                        $temp1[]=$qs1[st_id];
                      // echo $qs1[d_id];
                    }
                    //echo "Level 2<br>";
                }
                else{$s_idd=$temp[$x];
                    $stop=1;
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
                    $sql1="SELECT * FROM `silver_tree` WHERE `s_id`='$temp1[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 3) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp[]=$qs1[st_id];
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
                    $sql1="SELECT * FROM `silver_tree` WHERE `s_id`='$temp[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 3) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp1[]=$qs1[st_id];
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
 }else{$s_idd=find_last_s_id_all_silver_tree();}
    return $s_idd;
}

////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
function find_last_s_id_all_silver_tree()
{
    global $con;
    $temp=array();
    $temp1=array();
    $sql="SELECT * FROM `silver_tree` ORDER BY `st_id` ASC";
 $que=$con->query($sql);
 if ($que->num_rows > 0) {
     $qs=$que->fetch_assoc();
     //echo $qs[d_id];
    ///////////////////////////level 1
    $sql1="SELECT * FROM `silver_tree` WHERE `s_id`='$qs[st_id]';";
    $que1=$con->query($sql1);
    if ($que1->num_rows >= 3) {
        while($qs1=$que1->fetch_assoc())
        {
            $temp[]=$qs1[st_id];
        }
       // echo "Level 1<br>";
    }
    else{$s_idd=$qs[st_id];
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
                $sql1="SELECT * FROM `silver_tree` WHERE `s_id`='$temp[$x]';";
                $que1=$con->query($sql1);
                if ($que1->num_rows >= 3) {
                    while($qs1=$que1->fetch_assoc())
                    {
                        $temp1[]=$qs1[st_id];
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
                    $sql1="SELECT * FROM `silver_tree` WHERE `s_id`='$temp1[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 3) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp[]=$qs1[st_id];
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
                    $sql1="SELECT * FROM `silver_tree` WHERE `s_id`='$temp[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 3) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp1[]=$qs1[st_id];
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
function for_finding_upline_upgrade_d_id_for_silver($d_id)
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
            
            $snd="SELECT * FROM `silver_tree` WHERE `d_id`='$fet[d_id]'";
            $dcv=$con->query($snd);
            if($dcv->num_rows>0){
                $fet[d_id];
                if($fet[u_status]=='y')
                {
                    //echo $fet[d_id];
                    $u_d_id[]=$fet[d_id];
                }
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
function for_finding_silver_12completed_id($st_id)
{
    global $con,$date,$time;
    $fcd="SELECT * FROM `silver_tree` WHERE `st_id`='$st_id'";
    $que=$con->query($fcd);
    
    ////////////////////level 1 check 3 id
    $a=0;
    $sql="SELECT * FROM `silver_tree` WHERE `s_id`='$st_id'";
    $quet=$con->query($sql);
    while($er=$quet->fetch_assoc())
    {
        $a++;
        $sql1="SELECT * FROM `silver_tree` WHERE `s_id`='$er[st_id]'";
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
function for_finding_placement_rebirth_id_silver($d_id){
    global $con, $date, $time;
    $mnyh="SELECT * FROM `silver_tree` WHERE `d_id`='$d_id'";
    $xm=$con->query($mnyh);
    $vc=for_finding_upline_upgrade_d_id_for_silver($d_id);
    if($vc=="id not founded"){
    $d=find_last_s_id_all_silver_tree();
    //echo "if";
    }else{
        //echo "else";
        $v="select max(st_id) as max from silver_tree where d_id='$vc';";
        $cdv=$con->query($v);
        $cvbnm=$cdv->fetch_assoc();
        //echo $cvbnm[max];
        $d=find_last_s_id_d_id_silver_tree($cvbnm[max]);
    }
    $vvc="select max(st_id) as mayx from silver_tree where d_id='$d_id';";
        $cdvvc=$con->query($vvc);
        $cvbnmvc=$cdvvc->fetch_assoc();
    //echo $vc." d_id<br>";
    //echo $d." bt_s_id<br>";
   if(for_finding_silver_12completed_id($cvbnmvc[mayx])==1)
   {
       //echo "dsv"; 
       
   $hvgv="UPDATE `silver_tree` SET `status_of_12_c` = 'y' WHERE `silver_tree`.`st_id` = '$cvbnmvc[mayx]';";
    $ccc="INSERT INTO `silver_tree` (`st_id`, `s_id`, `d_id`, `e_date`, `e_time`, `rebirth_id`, `status_of_12_c`, `rebirth_from_st_id`) VALUES (NULL, '$d', '$d_id', '$date', '$time', 'y', 'n', '$cvbnmvc[mayx]');";
    if($con->query($ccc)===TRUE && $con->query($hvgv)===TRUE){
        $sqlxs="SELECT max(st_id) as mnb FROM `silver_tree`";
            $scxs=$con->query($sqlxs);
            $ssxs=$scxs->fetch_assoc();
        for_distributing_income_rebirth_silver_club_tree($ssxs[mnb]);
        for_finally_entering_gold_id($d_id);
        echo "Success";
    }
    else{$fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'rebirth function fail silver');";
    	        $con->query($fail);}
   }else{echo $d_id." not eligible";}
}


////////////////
//////////////////////////
/////////////////////////////////////
function for_distributing_income_silver_club_tree($st_id)
{
    global $con, $date, $time;
    $btsql="SELECT * FROM `silver_tree` WHERE `st_id`='$st_id'";
    $btque=$con->query($btsql);
    $btfet=$btque->fetch_assoc();
    echo $btsql;
    /////////////////////// level 1    1080/-
    $btsql1="SELECT * FROM `silver_tree` WHERE `st_id`='$btfet[s_id]'";
    $btque1=$con->query($btsql1);
    if($btque1->num_rows>0)
    {
        $btfet1=$btque1->fetch_assoc();
        $didsql="SELECT * FROM `distributor` WHERE `d_id`='$btfet1[d_id]'";
        $didque=$con->query($didsql);
        $didfet=$didque->fetch_assoc();
        $iw_wallet=$didfet[withdrawal_wallet]+1080;
        echo "lv1".$didfet[withdrawal_wallet].",".$iw_wallet."<br>";
        $sqlj="UPDATE `distributor` SET `withdrawal_wallet` = '$iw_wallet' WHERE `distributor`.`d_id` = '$btfet1[d_id]';";
        $sqa="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$btfet1[d_id]', '$date', '$time', '+', '1080', '$iw_wallet', 'silver Club Income', 'silver Club Level', '', '', '$btfet[d_id]', '1', 'silver Tree', '');";
        $sxxb="INSERT INTO `upgrade_income_on_income` (`uioi_id`, `d_id`, `date`, `time`, `club`, `status`, `amount`, `activated_d_id`) VALUES (NULL, '$btfet1[d_id]', '$date', '$time', 'silver', 'n', '1080', '$st_id');";
        if($con->query($sqlj)===TRUE && $con->query($sqa)===TRUE && $con->query($sxxb)===TRUE)
        { }else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'silver tree income distribution lv1');";
	        $con->query($fail);
        }
    }
    /////////////////////// level 2 5240/-
    $btsql2="SELECT * FROM `silver_tree` WHERE `st_id`='$btfet1[s_id]'";
    $btque2=$con->query($btsql2);
    if($btque2->num_rows>0)
    {
        $btfet2=$btque2->fetch_assoc();
        $didsql2="SELECT * FROM `distributor` WHERE `d_id`='$btfet2[d_id]'";
        $didque2=$con->query($didsql2);
        $didfet2=$didque2->fetch_assoc();
        $iw_wallet2=$didfet2[withdrawal_wallet]+5240;
        echo "lv2".$didfet2[withdrawal_wallet].",".$iw_wallet2;
        $sqlj2="UPDATE `distributor` SET `withdrawal_wallet` = '$iw_wallet2' WHERE `distributor`.`d_id` = '$btfet2[d_id]';";
        $sqa2="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$btfet2[d_id]', '$date', '$time', '+', '5240', '$iw_wallet2', 'silver Club Income', 'silver Club Level', '', '', '$btfet[d_id]', '2', 'silver Tree', '');";
        $sxxb2="INSERT INTO `upgrade_income_on_income` (`uioi_id`, `d_id`, `date`, `time`, `club`, `status`, `amount`, `activated_d_id`) VALUES (NULL, '$btfet2[d_id]', '$date', '$time', 'silver', 'n', '5240', '$st_id');";
        if($con->query($sqlj2)===TRUE && $con->query($sqa2)===TRUE && $con->query($sxxb2)===TRUE)
        { }else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'silver tree income distribution lv2');";
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
function for_distributing_income_rebirth_silver_club_tree($st_id)
{
    global $con, $date, $time;
    $btsql="SELECT * FROM `silver_tree` WHERE `st_id`='$st_id'";
    $btque=$con->query($btsql);
    $btfet=$btque->fetch_assoc();
    echo $btsql;
    /////////////////////// level 1    1080/-
    $btsql1="SELECT * FROM `silver_tree` WHERE `st_id`='$btfet[s_id]'";
    $btque1=$con->query($btsql1);
    if($btque1->num_rows>0)
    {
        $btfet1=$btque1->fetch_assoc();
        $didsql="SELECT * FROM `distributor` WHERE `d_id`='$btfet1[d_id]'";
        $didque=$con->query($didsql);
        $didfet=$didque->fetch_assoc();
        $iw_wallet=$didfet[withdrawal_wallet]+1080;
        echo "lv1".$didfet[withdrawal_wallet].",".$iw_wallet."<br>";
        $sqlj="UPDATE `distributor` SET `withdrawal_wallet` = '$iw_wallet' WHERE `distributor`.`d_id` = '$btfet1[d_id]';";
        $sqa="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$btfet1[d_id]', '$date', '$time', '+', '1080', '$iw_wallet', 'silver Club Income', 'silver Club Rebirth', '', '', '$btfet[d_id]', '1', 'silver Tree', '');";
        $sxxb="INSERT INTO `upgrade_income_on_income` (`uioi_id`, `d_id`, `date`, `time`, `club`, `status`, `amount`, `activated_d_id`) VALUES (NULL, '$btfet1[d_id]', '$date', '$time', 'silver Rebirth', 'n', '1080', '$st_id');";
        if($con->query($sqlj)===TRUE && $con->query($sqa)===TRUE && $con->query($sxxb)===TRUE)
        { }else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'silver tree income distribution rebirth lv1');";
	        $con->query($fail);
        }
    }
    /////////////////////// level 2 5240/-
    $btsql2="SELECT * FROM `silver_tree` WHERE `st_id`='$btfet1[s_id]'";
    $btque2=$con->query($btsql2);
    if($btque2->num_rows>0)
    {
        $btfet2=$btque2->fetch_assoc();
        $didsql2="SELECT * FROM `distributor` WHERE `d_id`='$btfet2[d_id]'";
        $didque2=$con->query($didsql2);
        $didfet2=$didque2->fetch_assoc();
        $iw_wallet2=$didfet2[withdrawal_wallet]+5240;
        echo "lv2".$didfet2[withdrawal_wallet].",".$iw_wallet2;
        $sqlj2="UPDATE `distributor` SET `withdrawal_wallet` = '$iw_wallet2' WHERE `distributor`.`d_id` = '$btfet2[d_id]';";
        $sqa2="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$btfet2[d_id]', '$date', '$time', '+', '5240', '$iw_wallet2', 'silver Club Income', 'silver Club Rebirth', '', '', '$btfet[d_id]', '2', 'silver Tree', '');";
        $sxxb2="INSERT INTO `upgrade_income_on_income` (`uioi_id`, `d_id`, `date`, `time`, `club`, `status`, `amount`, `activated_d_id`) VALUES (NULL, '$btfet2[d_id]', '$date', '$time', 'silver Rebirth', 'n', '5240', '$st_id');";
        if($con->query($sqlj2)===TRUE && $con->query($sqa2)===TRUE && $con->query($sxxb2)===TRUE)
        { }else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'silver tree income distribution rebirth lv2');";
	        $con->query($fail);
        }
    }
}
//////////////////////
/////////////////////////////
///////////////////////////////////////
function for_finding_placement_id_silver($d_id){
    global $con, $date, $time;
    $mnyh="SELECT * FROM `silver_tree` WHERE `d_id`='$d_id'";
    $xm=$con->query($mnyh);
    $vc=for_finding_upline_upgrade_d_id_for_silver($d_id);
    if($vc=="id not founded"){
    $d=find_last_s_id_all_silver_tree();
    //echo "if";
    }else{
        //echo "else";
        $v="select max(st_id) as max from silver_tree where d_id='$vc';";
        $cdv=$con->query($v);
        $cvbnm=$cdv->fetch_assoc();
        //echo $cvbnm[max];
        $d=find_last_s_id_d_id_silver_tree($cvbnm[max]);
    }
    echo $vc." d_id<br>";
    echo $d." rt_s_id<br>";
    
    $ccc="INSERT INTO `silver_tree` (`st_id`, `s_id`, `d_id`, `e_date`, `e_time`, `rebirth_id`, `status_of_12_c`, `rebirth_from_st_id`, `income_distributed`) VALUES (NULL, '$d', '$d_id', '$date', '$time', 'n', 'n', '', 'n');";
    
    if($con->query($ccc)===TRUE){
            $sqlxs="SELECT max(st_id) as mnb FROM `silver_tree`";
            $scxs=$con->query($sqlxs);
            $ssxs=$scxs->fetch_assoc();
        for_distributing_income_silver_club_tree($ssxs[mnb]);
		echo "success";
    }
    else{ $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'for_finding_placement_id_silver function placement fail');";
	        $con->query($fail);}
}

/////////////////////////
///////////////////////function for entering final silver tree
function for_finally_entering_silver_id($d_id)
{
    global $con,$date,$time;
    /////////////////////////for entering rebirth id
    $fvv="SELECT * FROM `silver_tree` WHERE `status_of_12_c`='n'";
    $xmn=$con->query($fvv);
    while($xmnn=$xmn->fetch_assoc())
    {
        
        echo $xmnn[st_id]." c= ".for_finding_silver_12completed_id($xmnn[st_id])." ,".$xmnn[d_id]."<br>";
        if(for_finding_silver_12completed_id($xmnn[st_id])=='1')
        {
            for_finding_placement_rebirth_id_silver($xmnn[d_id]);
        }
    }
    
    ////////////////////////for entering new id
    for_finding_placement_id_silver($d_id);
    
    /////////////////////////for entering rebirth id
    $fvv="SELECT * FROM `silver_tree` WHERE `status_of_12_c`='n'";
    $xmn=$con->query($fvv);
    while($xmnn=$xmn->fetch_assoc())
    {
        echo $xmnn[st_id]." c= ".for_finding_silver_12completed_id($xmnn[st_id])." ,".$xmnn[d_id]."<br>";
        if(for_finding_silver_12completed_id($xmnn[st_id])=='1')
        {
            for_finding_placement_rebirth_id_silver($xmnn[d_id]);
        }
    }
}

//for_finally_entering_silver_id(1);
//for_finding_placement_rebirth_id_silver(1);
//for_finding_placement_id_silver(137825);
//for_distributing_income_silver_club_tree(2);