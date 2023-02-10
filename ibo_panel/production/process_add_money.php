<?php

include("../../database_connect.php");

	$status=$_POST["status"];
	$firstname=$_POST["firstname"];
	$amount=$_POST["amount"];
	$txnid=$_POST["txnid"];
	$posted_hash=$_POST["hash"];
	$key=$_POST["key"];
	$productinfo=$_POST["productinfo"];
	$email=$_POST["email"];
	$e_id=$_POST["e_id"];
	$salt="z7H0Q2K5VO";
	If (isset($_POST["additionalCharges"])) {
		   $additionalCharges=$_POST["additionalCharges"];
			$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

					  }
		else {	  

			$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

			 }
			 $hash = hash("sha512", $retHashSeq);

		   if ($hash != $posted_hash) {
			   echo "Invalid Transaction. Please try again";
			   }
		   else {

$edfffff="SELECT * FROM `main_wallet` WHERE `recharge_unq_id`='$txnid'";
$aop=$con->query($edfffff);
if($aop->num_rows==0)
{



$sax="SELECT * FROM `temp_txn_handler` WHERE `txn_id`='$txnid'";
$qu=$con->query($sax);
$detail=mysqli_fetch_assoc($qu);
$asa="SELECT * FROM `distributor` WHERE `d_id`='$detail[d_id]'";
$edd=$con->query($asa);
$ibo=mysqli_fetch_assoc($edd);
echo $ibo[main_wallet];
if($status=="success")
{
    $bal=$ibo[main_wallet]+$detail[amount];
    $ssdf="UPDATE `distributor` SET `main_wallet` = '$bal' WHERE `distributor`.`d_id` = '$detail[d_id]';";
    //$dsds="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$detail[d_id]', '$date', '$time', '+', '$amount', '$bal', 'Online added Money', '', '', '', '', '', '$txnid', '');";
    $dsds="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `recharge_unq_id`) VALUES (NULL, '$detail[d_id]', '+', '$detail[amount]', '$bal', 'Online added Money', '', '', '', '$date', '$time', '$txnid');";
    $sccccvv="UPDATE `temp_txn_handler` SET `status` = 'Success' WHERE `temp_txn_handler`.`txn_id` = '$txnid';";
    if($con->query($ssdf)===TRUE && $con->query($dsds)===TRUE && $con->query($sccccvv)===TRUE)
    {
        echo "Success";
        echo "<script>alert('Success ! Amount added to your account successfully'); location.href='add_moneyd.php';</script>";
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'add money');";
    	        $con->query($fail);
            echo "<script>alert('Failed ! sorry some problem occours'); location.href='add_moneyd.php';</script>";
    }
}else{	echo "<script>alert('Failed ! sorry some problem occours'); location.href='add_moneyd.php';</script>";
}
}else{echo "<script>alert('Success ! Amount added to your account successfully'); location.href='add_moneyd.php';</script>";}
}

?>