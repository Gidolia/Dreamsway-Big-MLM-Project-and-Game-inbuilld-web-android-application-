<?php
include "config.php";

///////////////////////////////////////////
/////////function for entering in auto matrix
//////////////////////////////////////////////function for inserting id
/*function insert_id($d_id,$s_id)
 {
     global $con, $date, $time;
     $sa="SELECT * FROM `auto_matrix_tree` WHERE `d_id`='$d_id';";
     $ax=$con->query($sa);
     if($ax->num_rows==0)
     {
         
         //////////////////for finding $s_id
         $sqlkj="SELECT MAX(amt_id) as max FROM `auto_matrix_tree` WHERE `s_id`='$s_id'";
  		$dfgh=$con->query($sqlkj);
		$fdbv=mysqli_fetch_array($dfgh);
		//$d_id=$fdbv[max]+1;
		
		
		$dssdsd="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$s_id' AND `id_type`='d';";
		
		
		$instq .="INSERT INTO `auto_matrix_new_id_enter` (`amnie_id`, `d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$date', '$time');";
		
         $saw="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fdbv[max]';";
         $ass=$con->query($saw);
         if($ass->num_rows==0)
         {
         $instq .="INSERT INTO `auto_matrix_tree` (`amt_id`, `s_id`, `d_id`, `id_type`, `e_date`, `e_time`, `i_distributed`) VALUES (NULL, '$s_id', '$d_id', 'r', '$date', '$time', 'n');";
         }
         else{
             $s_idd=$s_id+1;
             $instq .="UPDATE `auto_matrix_tree` SET `d_id` = '$d_id' WHERE `auto_matrix_tree`.`amt_id` = $fdbv[max];";
             $instq .="UPDATE `auto_matrix_tree` SET `id_type` = 'r' WHERE `auto_matrix_tree`.`amt_id` = $fdbv[max];";
         }

     if($con->multi_query($instq) === TRUE)
		{
		    while ($mysqli->next_result()) {;}///////flushing unnessary query
		    
		    ///////////for entering all dummy id
		    
		    
		  /*  $sqdl="SELECT * FROM `auto_matrix_tree` WHERE `id_type`='r' ORDER BY `amt_id` ASC;";
             $qued=$con->query($sqdl);
             if ($qued->num_rows > 0) {
                while($fet=$qued->fetch_assoc())
                {
                    
                    
                    $s_id=find_last_s_id_s_dummy();
                     $sqdlw="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$s_id' ORDER BY `amt_id` ASC";
                     $quedw=$con->query($sqdlw);
                     if ($quedw->num_rows > 0) {
                        $fetw=$quedw->fetch_assoc();
                        
                           $instq="UPDATE `auto_matrix_tree` SET `d_id` = '$fet[d_id]' WHERE `auto_matrix_tree`.`amt_id` = $s_id;";
                           $instqq="UPDATE `auto_matrix_tree` SET `id_type` = 'd' WHERE `auto_matrix_tree`.`amt_id` = $s_id;";
                           $instqqq="UPDATE `auto_matrix_tree` SET `e_date` = '$date' WHERE `auto_matrix_tree`.`amt_id` = $s_id;";
                           $instqqqq="UPDATE `auto_matrix_tree` SET `e_time` = '$time' WHERE `auto_matrix_tree`.`amt_id` = $s_id";
                           $con->query($instq);
                           $con->query($instqq);
                           $con->query($instqqq);
                           $con->query($instqqqq);
                            echo $fetw[amt_id].", ".$fet[d_id]." update<br>";
                           
                     }else{
                         $insttt="INSERT INTO `auto_matrix_tree` (`amt_id`, `s_id`, `d_id`, `id_type`, `e_date`, `e_time`, `i_distributed`) VALUES (NULL, '$s_id', '$fet[d_id]', 'd', '', '', 'n');";
                         $con->query($insttt);
                         echo $fetw[amt_id].", ".$fet[d_id]." insert<br>";
                     }
                    //echo $fet[amt_id].", ";
                }
             }
		    
		    
		    /////////////////////
		    
			echo "<h1>success</h1>";
		}
	 	else
		{
		 	echo "<script>alert('Query failed to enter id please try again');
		 	</script> <h1> failed</h1>";
	 	}
	 	//echo "update id ".$fdbv[max];
     }
 }
 
 */
 
 
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
    		///////////////////////for finding placing id or sponser
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
 
 echo insert_d_id(11);
 //echo place_dummy_id();
 
 
 