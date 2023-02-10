<?php

function direct_sponser($d_id)
{
	global $con;
	$a=0;
	$g="SELECT * FROM `distributor` WHERE `s_id`='$d_id'";
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
        $g="SELECT * FROM `distributor`";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
           $au++;
        }
    return $au;
}


////////////////////////////function Today team counter
function downline_counter_date($d_id)
{
    $au=0;
    global $con,$date;
    
        $g="SELECT * FROM `distributor` WHERE `reg_date`='$date'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            $au++;
        }
        return $au;
}
////////////////////////////function Today active team counter
function active_counter_date($d_id)
{
    $au=0;
    global $con,$date;
    
        $g="SELECT * FROM `distributor` WHERE `a_date`='$date'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            $au++;
        }
        return $au;
}
////////////////////////////function Total active team counter
function active_counter_id($d_id)
{
    $au=0;
    global $con,$date;
    
        $g="SELECT * FROM `distributor` WHERE `a_status`='y'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            $au++;
        }
        return $au;
}
function inactive_counter_id($d_id)
{
    $au=0;
    global $con,$date;
    
        $g="SELECT * FROM `distributor` WHERE `a_status`='n'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            $au++;
        }
        return $au;
}
function upgrade_counter_id($d_id)
{
    $au=0;
    global $con,$date;
    
        $g="SELECT * FROM `distributor` WHERE `u_status`='y'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            $au++;
        }
        return $au;
}


///////////////////////function to find total income
function total_income($d_id)
{
	global $con,$date;
	$sd="SELECT * FROM `activate1_wallet_history` WHERE `d_id`='$d_id'";
	$fg=$con->query($sd);
	while($er=$fg->fetch_assoc()){
		if($er[type]=="+")
		{
			$grand=$grand+$er[amount];
		}
	}
	$grand=$grand+0;
	return $grand;
}
///////////////////////////////////////////////////////
function total_income_till_date($d_id)
{
	global $con,$date;
	$sd="SELECT * FROM `withdrawal_wallet` WHERE `d_id`='$d_id'";
	$fg=$con->query($sd);
	while($er=$fg->fetch_assoc()){
		if($er[type]=="+")
		{
			$grand=$grand+$er[amount];
		}
	}
	$grand=$grand+0;
	return $grand;
}


/////////////////////////////////
////////////////////////////////////////
/////////////////function for refreshing auto matrix id
function refresh_auto_matrix()
{
    global $con, $date, $time;
    $cxs="SELECT * FROM `auto_matrix_tree` WHERE `id_type`='r' AND `i_distributed`='n' ORDER BY `amt_id` ASC";
    $ass=$con->query($cxs);
    while($scc=$ass->fetch_assoc())
    {
        
        
    }
    
}
///////////////////////////function for distributing automatrix level income
function distribute_auto_matrix_level($amt_id)
{   
    $cxsc="SELECT * FROM `auto_matrix_tree` WHERE `id_type`='r' AND `i_distributed`='n' AND `amt_id`='$amt_id' ORDER BY `amt_id` ASC";
    $assc=$con->query($cxsc);
    if($assc->num_rows>0)
    {
        $fe=$assc->fetch_assoc();
        
        ////////////////////////level1 
        
        
        
        
        
    }
    
}