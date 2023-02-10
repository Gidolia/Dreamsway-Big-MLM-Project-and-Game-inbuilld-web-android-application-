<?php 
include "../../database_connect.php";
///////////////////////////////////////////
/////////function for entering in auto matrix
//////////////////////////////////////////////function for inserting id

 function u_insert_d_id($d_id)
{
    global $con, $date, $time;
    $sa="SELECT * FROM `u_auto_matrix_tree` WHERE `d_id`='$d_id';";
    $ax=$con->query($sa);
    if($ax->num_rows==0)
    {
        $dder="DELETE FROM `u_auto_matrix_tree` WHERE `u_auto_matrix_tree`.`id_type` = 'd';";
        if($con->query($dder)===TRUE)
        {
            
            //////////////////////for finding max uamt_id
            
            $sqlkj="SELECT MAX(uamt_id) as max FROM `u_auto_matrix_tree`";
      		$dfgh=$con->query($sqlkj);
    		$fdbv=mysqli_fetch_array($dfgh);
    		$uamt_id=$fdbv[max]+1;
    		echo "amt id ".$uamt_id;
    		///////////////////////for finding placing id or sponser
    		$s_id=u_find_last_s_id_all();
    		$dfd="INSERT INTO `u_auto_matrix_tree` (`uamt_id`, `s_id`, `d_id`, `id_type`, `e_date`, `e_time`, `i_distributed`) VALUES ('$uamt_id', '$s_id', '$d_id', 'r', '$date', '$time', 'n');";
    		
    		if($con->query($dfd)===TRUE)
    		{
    		///////////////start placing dummy id
    		u_place_dummy_id();
    		}
    		else{
    		    $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'u_auto_matrix_tree placing id fail');";
    	        $con->query($fail);
    		    echo "fail";
    		}
            ///////////////////////////////
        }
        else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'u_auto_matrix_tree dummy delete');";
    	        $con->query($fail);
        }
    }
}
 
 function u_place_dummy_id()
 {
    global $con,$date,$time;
        $s_id=u_find_last_s_id_all();
        
        //////////////////////for finding max uamt_id
        
            $sqlkj="SELECT MAX(uamt_id) as max FROM `u_auto_matrix_tree`";
      		$dfgh=$con->query($sqlkj);
    		$fdbv=mysqli_fetch_array($dfgh);
    		$uamt_id=$fdbv[max]+1;
        
        $scsx="SELECT * FROM `u_auto_matrix_tree` WHERE `s_id`='$s_id'";
        $sxx=$con->query($scsx);
        if($sxx->num_rows==0){$count=0;}
        elseif($sxx->num_rows==1){$count=1;}
        else{$count=2;}
        $sq="SELECT * FROM `u_auto_matrix_tree` WHERE `id_type`='r' ORDER BY `uamt_id` ASC;";
    	$der=$con->query($sq);
    	while($bg=$der->fetch_assoc())
    	{
    	    if($count==0){$count++;}
    	    elseif($count==1){$count++;}
    	     elseif($count>1){$count=1; $s_id++;}
    	    $uamt_id=$uamt_id+1;
    	    $dfd="INSERT INTO `u_auto_matrix_tree` (`uamt_id`, `s_id`, `d_id`, `id_type`, `e_date`, `e_time`, `i_distributed`) VALUES ('$uamt_id', '$s_id', '$bg[d_id]', 'd', '', '', 'n');";
    	    if($con->query($dfd)===TRUE)
    	    {
    	        echo "sucess";
    	    }
    	    else{
    	        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'u_auto_matrix_tree');";
    	        $con->query($fail);
    	        
    	        echo "fail";}
    	    //echo "<br>".$bg[uamt_id]." (d_id".$bg[d_id].") (id_type".$bg[id_type].") (duamt_id".$uamt_id.") (s_id".$s_id.") (counter".$count;
    	}
 }
///////////////////////////////////////////////function for finding last all s_id
function u_find_last_s_id_all()
{
    global $con;
    $temp=array();
    $temp1=array();
    $sql="SELECT * FROM `u_auto_matrix_tree` ORDER BY `uamt_id` ASC";
 $que=$con->query($sql);
 if ($que->num_rows > 0) {
     $qs=$que->fetch_assoc();
     //echo $qs[d_id];
    ///////////////////////////level 1
    $sql1="SELECT * FROM `u_auto_matrix_tree` WHERE `s_id`='$qs[uamt_id]';";
    $que1=$con->query($sql1);
    if ($que1->num_rows >= 2) {
        while($qs1=$que1->fetch_assoc())
        {
            $temp[]=$qs1[uamt_id];
        }
       // echo "Level 1<br>";
    }
    else{$s_idd=$qs[uamt_id];
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
                $sql1="SELECT * FROM `u_auto_matrix_tree` WHERE `s_id`='$temp[$x]';";
                $que1=$con->query($sql1);
                if ($que1->num_rows >= 2) {
                    while($qs1=$que1->fetch_assoc())
                    {
                        $temp1[]=$qs1[uamt_id];
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
                    $sql1="SELECT * FROM `u_auto_matrix_tree` WHERE `s_id`='$temp1[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 2) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp[]=$qs1[uamt_id];
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
                    $sql1="SELECT * FROM `u_auto_matrix_tree` WHERE `s_id`='$temp[$x]';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 2) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp1[]=$qs1[uamt_id];
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
function u_find_last_s_id_s_dummy()
{
    global $con;
    $temp=array();
    $temp1=array();
    
    $sql="SELECT * FROM `u_auto_matrix_tree` ORDER BY `uamt_id` ASC";
 $que=$con->query($sql);
 if ($que->num_rows > 0) {
     $qs=$que->fetch_assoc();
     //echo $qs[d_id];
    ///////////////////////////level 1
    $sql1="SELECT * FROM `u_auto_matrix_tree` WHERE `s_id`='$qs[uamt_id]' AND `id_type`='r';";
    $que1=$con->query($sql1);
    if ($que1->num_rows >= 2) {
        while($qs1=$que1->fetch_assoc())
        {
            $temp[]=$qs1[uamt_id];
        }
       // echo "Level 1<br>";
    }
    else{$s_idd=$qs[uamt_id];
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
                $sql1="SELECT * FROM `u_auto_matrix_tree` WHERE `s_id`='$temp[$x]' AND `id_type`='r';";
                $que1=$con->query($sql1);
                if ($que1->num_rows >= 2) {
                    while($qs1=$que1->fetch_assoc())
                    {
                        $temp1[]=$qs1[uamt_id];
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
                    $sql1="SELECT * FROM `u_auto_matrix_tree` WHERE `s_id`='$temp1[$x]' AND `id_type`='r';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 2) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp[]=$qs1[uamt_id];
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
                    $sql1="SELECT * FROM `u_auto_matrix_tree` WHERE `s_id`='$temp[$x]' AND `id_type`='r';";
                    $que1=$con->query($sql1);
                    if ($que1->num_rows >= 2) {
                        while($qs1=$que1->fetch_assoc())
                        {
                            $temp1[]=$qs1[uamt_id];
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
//echo u_insert_d_id(6);

