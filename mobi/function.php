<?php
//include "../../database_connect.php";
function direct_sponser($d_id)
{
	global $con;
	$a=0;
	$g="SELECT * FROM `distributor` WHERE `s_id`='$_SESSION[d_id]'";
    $dc=$con->query($g);
	while($d=$dc->fetch_assoc())
    {
		$a++;
	}
	return $a;
}

////////////////////////////function total team counter
function downline_counter($d_id)
{
    $au=0;
    global $con;
    
        
        $g="SELECT * FROM `distributor` WHERE `s_id`='$d_id'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            $au++;
            
            
            $g2="SELECT * FROM `distributor` WHERE `s_id`='$d[d_id]'";
            $que2=$con->query($g2);
            while($d2=$que2->fetch_assoc())
            {
                $au++;
                
                $g3="SELECT * FROM `distributor` WHERE `s_id`='$d2[d_id]'";
                $que3=$con->query($g3);
                while($d3=$que3->fetch_assoc())
                {
                    $au++;
                    
                    $g4="SELECT * FROM `distributor` WHERE `s_id`='$d3[d_id]'";
                    $que4=$con->query($g4);
                    while($d4=$que4->fetch_assoc())
                    {
                        $au++;
                       
                        $g5="SELECT * FROM `distributor` WHERE `s_id`='$d4[d_id]'";
                        $que5=$con->query($g5);
                        while($d5=$que5->fetch_assoc())
                        {
                            $au++;
                           
                            $g6="SELECT * FROM `distributor` WHERE `s_id`='$d5[d_id]'";
                            $que6=$con->query($g6);
                            while($d6=$que6->fetch_assoc())
                            {
                                $au++;
                               
                                
                            }
                        }
                    }
                }
            }
        }
        return $au;
}


////////////////////////////function Today team counter
function downline_counter_date($d_id)
{
    $au=0;
    global $con,$date;
    
        
        $g="SELECT * FROM `distributor` WHERE `s_id`='$d_id'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
			if($d[reg_date]==$date)
			{
            $au++;
			}
            
            $g2="SELECT * FROM `distributor` WHERE `s_id`='$d[d_id]'";
            $que2=$con->query($g2);
            while($d2=$que2->fetch_assoc())
            {
                if($d2[reg_date]==$date)
				{
				$au++;
				}
                
                $g3="SELECT * FROM `distributor` WHERE `s_id`='$d2[d_id]'";
                $que3=$con->query($g3);
                while($d3=$que3->fetch_assoc())
                {
                    if($d3[reg_date]==$date)
					{
					$au++;
					}
                    
                    $g4="SELECT * FROM `distributor` WHERE `s_id`='$d3[d_id]'";
                    $que4=$con->query($g4);
                    while($d4=$que4->fetch_assoc())
                    {
                        if($d4[reg_date]==$date)
						{
						$au++;
						}
                       
                        $g5="SELECT * FROM `distributor` WHERE `s_id`='$d4[d_id]'";
                        $que5=$con->query($g5);
                        while($d5=$que5->fetch_assoc())
                        {
                            if($d5[reg_date]==$date)
							{
							$au++;
							}
                           
                            $g6="SELECT * FROM `distributor` WHERE `s_id`='$d5[d_id]'";
                            $que6=$con->query($g6);
                            while($d6=$que6->fetch_assoc())
                            {
                                if($d6[reg_date]==$date)
								{
								$au++;
								}
                               
                            }
                        }
                    }
                }
            }
        }
        return $au;
}

//////////////////////////////////////////////////////
////////////////////////////////////////function for substracting withdrawal amount
function sub_withdrawal_amount($d_id, $amount, $note, $from_d_id, $to_d_id)
{
    global $con, $date, $time;
    
    $sql="SELECT * FROM `distributor` WHERE `d_id`='$d_id';";
    $que=$con->query($sql);
    while($row=$que->fetch_assoc())
    {
       $a_bal=$row['withdrawal_wallet']-$amount;
        if($a_bal>0)
        {
            $sc="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`) VALUES (NULL, '$d_id', '$date', '$time', '-', '$amount', '$a_bal', '$note', '', '$from_d_id', '$to_d_id');";
            $up="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal' WHERE `distributor`.`d_id` = '$d_id';";
            if($con->query($sc)===TRUE && $con->query($up)===TRUE)
            {
                $res=1;
            }
            else{$res=0;}
        }
        else{$res=2;}
    }
    return $res;
}

///////////////////////////////////////////
/////////function for entering in auto matrix
//////////////////////////////////////////////function for inserting id
 function insert_d_id($d_id)
{
    global $con, $date, $time;
    $sa="SELECT * FROM `auto_matrix_tree` WHERE `d_id`='$d_id';";
    $ax=$con->query($sa);
    if($ax->num_rows==0)
    {
        $dder="DELETE FROM `auto_matrix_tree` WHERE `auto_matrix_tree`.`id_type` = 'd';";
        if($con->query($dder)===TRUE)
        {
            
            
            //////////////////////for finding max amt_id
            
            $sqlkj="SELECT MAX(amt_id) as max FROM `auto_matrix_tree`";
      		$dfgh=$con->query($sqlkj);
    		$fdbv=mysqli_fetch_array($dfgh);
    		$amt_id=$fdbv[max]+1;
    		echo "amt id ".$amt_id;
    		/////////////////////for finding placing id or sponser
    		$s_id=find_last_s_id_all();
    		$dfd="INSERT INTO `auto_matrix_tree` (`amt_id`, `s_id`, `d_id`, `id_type`, `e_date`, `e_time`, `i_distributed`) VALUES ('$amt_id', '$s_id', '$d_id', 'r', '$date', '$time', 'n');";
    		
    		if($con->query($dfd)===TRUE)
    		{
        		///////////////start placing dummy id
        		place_dummy_id();
    		}
    		else{
    		    $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'auto_matrix_tree placing id fail');";
    	        $con->query($fail);
    		    echo "fail";
    		}
            ///////////////////////////////
        }
        else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'auto_matrix_tree dummy delete');";
    	        $con->query($fail);
        }
    }
}
 
 function place_dummy_id()
 {
    global $con,$date,$time;
        $s_id=find_last_s_id_all();
        
        //////////////////////for finding max amt_id
        
            $sqlkj="SELECT MAX(amt_id) as max FROM `auto_matrix_tree`";
      		$dfgh=$con->query($sqlkj);
    		$fdbv=mysqli_fetch_array($dfgh);
    		$amt_id=$fdbv[max]+1;
        
        $scsx="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$s_id'";
        $sxx=$con->query($scsx);
        if($sxx->num_rows==0){$count=0;}
        elseif($sxx->num_rows==1){$count=1;}
        else{$count=2;}
        $sq="SELECT * FROM `auto_matrix_tree` WHERE `id_type`='r' ORDER BY `amt_id` ASC;";
    	$der=$con->query($sq);
    	while($bg=$der->fetch_assoc())
    	{
    	    if($count==0){$count++;}
    	    elseif($count==1){$count++;}
    	     elseif($count>1){$count=1; $s_id++;}
    	    $amt_id=$amt_id+1;
    	    $dfd="INSERT INTO `auto_matrix_tree` (`amt_id`, `s_id`, `d_id`, `id_type`, `e_date`, `e_time`, `i_distributed`) VALUES ('$amt_id', '$s_id', '$bg[d_id]', 'd', '', '', 'n');";
    	    if($con->query($dfd)===TRUE)
    	    {
    	        echo "sucess";
    	    }
    	    else{
    	        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'auto_matrix_tree');";
    	        $con->query($fail);
    	        
    	        echo "fail";}
    	    //echo "<br>".$bg[amt_id]." (d_id".$bg[d_id].") (id_type".$bg[id_type].") (damt_id".$amt_id.") (s_id".$s_id.") (counter".$count;
    	}
 }
///////////////////////////////////////////////function for finding last all s_id
function find_last_s_id_all()
{
    global $con;
    $temp=array();
    $temp1=array();
    $sql="SELECT * FROM `auto_matrix_tree` ORDER BY `amt_id` ASC";
 $que=$con->query($sql);
 if ($que->num_rows > 0) {
     $qs=$que->fetch_assoc();
     //echo $qs[d_id];
    ///////////////////////////level 1
    $sql1="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$qs[amt_id]';";
    $que1=$con->query($sql1);
    if ($que1->num_rows >= 2) {
        while($qs1=$que1->fetch_assoc())
        {
            $temp[]=$qs1[amt_id];
        }
       // echo "Level 1<br>";
    }
    else{$s_idd=$qs[amt_id];
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
                $sql1="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$temp[$x]';";
                $que1=$con->query($sql1);
                if ($que1->num_rows >= 2) {
                    while($qs1=$que1->fetch_assoc())
                    {
                        $temp1[]=$qs1[amt_id];
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
                    $sql1="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$temp1[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 2) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp[]=$qs1[amt_id];
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
                    $sql1="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$temp[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 2) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp1[]=$qs1[amt_id];
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


///////////////////////////////////////////////function for finding last before dummy id  s_id
function find_last_s_id_s_dummy()
{
    global $con;
    $temp=array();
    $temp1=array();
    
    $sql="SELECT * FROM `auto_matrix_tree` ORDER BY `amt_id` ASC";
 $que=$con->query($sql);
 if ($que->num_rows > 0) {
     $qs=$que->fetch_assoc();
     //echo $qs[d_id];
    ///////////////////////////level 1
    $sql1="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$qs[amt_id]' AND `id_type`='r';";
    $que1=$con->query($sql1);
    if ($que1->num_rows >= 2) {
        while($qs1=$que1->fetch_assoc())
        {
            $temp[]=$qs1[amt_id];
        }
       // echo "Level 1<br>";
    }
    else{$s_idd=$qs[amt_id];
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
                $sql1="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$temp[$x]' AND `id_type`='r';";
                $que1=$con->query($sql1);
                if ($que1->num_rows >= 2) {
                    while($qs1=$que1->fetch_assoc())
                    {
                        $temp1[]=$qs1[amt_id];
                      //  echo $qs1[d_id];
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
                    $sql1="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$temp1[$x]' AND `id_type`='r';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 2) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp[]=$qs1[amt_id];
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
                    $sql1="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$temp[$x]' AND `id_type`='r';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 2) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp1[]=$qs1[amt_id];
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

///////////////////////////////////function mobile recharge
function distribute_recharge_income($a_d_id,$amount,$unq_id)
{
    
    global $con, $date, $time;
    $amm=$amount*1/100;
    $lsql="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$a_d_id'";
 $que=$con->query($lsql);
 $fet=mysqli_fetch_assoc($que);
    $withdrawal_wallet=$fet[withdrawal_wallet]+$amm;
    $sql="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet[d_id]', '$date', '$time', '+', '$amm', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '0', '$unq_id');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet[d_id]';";
    
    
    ///////////////////////////level 1 0.4%
 $amount1=$amount*0.4/100;
 $lsql1="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet[s_id]'";
 $que1=$con->query($lsql1);
 $fet1=mysqli_fetch_assoc($que1);
 
    $withdrawal_wallet=$fet1[withdrawal_wallet]+$amount1;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet1[d_id]', '$date', '$time', '+', '$amount1', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '1', '$unq_id');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet1[d_id]';";
    
    
 
 ///////////////////////////level 2 0.3%
 $amount2=$amount*0.3/100;
 $lsql2="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet1[s_id]'";
 $que2=$con->query($lsql2);
 $fet2=mysqli_fetch_assoc($que2);
 
 
    $withdrawal_wallet=$fet2[withdrawal_wallet]+$amount2;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet2[d_id]', '$date', '$time', '+', '$amount2', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '2', '$unq_id');";;
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet2[d_id]';";
    
 
 ///////////////////////////level 3 0.2%
 $amount3=$amount*0.2/100;
 $lsql3="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet2[s_id]'";
 $que3=$con->query($lsql3);
 $fet3=mysqli_fetch_assoc($que3);
 
 
     $withdrawal_wallet=$fet3[withdrawal_wallet]+$amount3;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet3[d_id]', '$date', '$time', '+', '$amount3', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '3', '$unq_id');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet3[d_id]';";
    
    
 
 
 ///////////////////////////level 4 0.2%
 $amount4=$amount*0.2/100;
 $lsql4="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet3[s_id]'";
 $que4=$con->query($lsql4);
 $fet4=mysqli_fetch_assoc($que4);
 
     $withdrawal_wallet=$fet4[withdrawal_wallet]+$amount4;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet4[d_id]', '$date', '$time', '+', '$amount4', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '4', '$unq_id');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet4[d_id]';";
 ///////////////////////////level 5 0.3%
 $amount5=$amount*0.3/100;
 $lsql5="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet4[s_id]'";
 $que5=$con->query($lsql5);
 $fet5=mysqli_fetch_assoc($que5);
 
     $withdrawal_wallet=$fet5[withdrawal_wallet]+$amount5;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet5[d_id]', '$date', '$time', '+', '$amount5', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '5', '$unq_id');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet5[d_id]';";
 
 ///////////////////////////level 6 0.4%
 $amount6=$amount*0.4/100;
 $lsql6="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet5[s_id]'";
 $que6=$con->query($lsql6);
 $fet6=mysqli_fetch_assoc($que6);
 
     $withdrawal_wallet=$fet6[withdrawal_wallet]+$amount6;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet6[d_id]', '$date', '$time', '+', '$amount6', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '6', '$unq_id');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet6[d_id]';";
    
    if($con->multi_query($sql)===TRUE)
    {
        $c="y";
    }
    else{
        $c="n";
    }
    return $c;
}

/////////////////////////function for sending sms
function send_sms($mobile, $message, $sms_for, $d_id)
{
    global $con, $date, $time;
     $dd = str_replace(' ', '%20', $message);
	$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=NGACTY&smstype=TRANS&numbers='.$mobile.'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	
	$sms_query="INSERT INTO `sms_handling` (`sh_id`, `d_id`, `message`, `date`, `time`, `response`, `mobile`, `session_d_id`) VALUES (NULL, '$d_id', '$message', '$date', '$time', '$response', '$mobile', '$_SESSION[d_id]');";
	$con->query($sms_query);
}


//echo distribute_recharge_income(658932,100);
//echo sub_withdrawal_amount('1', '100.25', "for testing", '', '');
//echo find_last_s_id_all()." all last<br>";
//echo find_last_s_id_s_dummy()." last dummy<br>";
//echo insert_id(10,3);
//echo shift_dummy_id($start_amt_id);

