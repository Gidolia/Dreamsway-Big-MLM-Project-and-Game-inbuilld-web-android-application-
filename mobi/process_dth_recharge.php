<?php include "config.php";

$gf="SELECT * FROM `recharge_response` WHERE `unique_id`='$_GET[ref_no]'";
$sbo=$con->query($gf);
$dpoi=$sbo->fetch_assoc();
    $urla='https://www.rechargedaddy.in/RDRechargeAPI/RechargeAPI.aspx?MobileNo=9588417929&APIKey=dRvdlFf3mmFBSL2nmdoDcQFznBSoqeQ7sxV&REQTYPE=STATUS&REFNO='.$_GET[ref_no].'&RESPTYPE=JSON';
    $ch = curl_init($urla);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
    echo $response;
    $obj = json_decode($response);
        $str_arr = explode (",", $response);
        ///////
        if($obj->TRNSTATUS == "1")
        {
           $reef="UPDATE `recharge_response` SET `recharge_status` = 'Success' WHERE `recharge_response`.`unique_id` = '$_GET[ref_no]';";
           $sav="UPDATE `recharge_response` SET `commission_distributed` = 'y' WHERE `recharge_response`.`unique_id` = '$_GET[ref_no]';";
           $savw="UPDATE `recharge_response` SET `hold_amount` = 'n' WHERE `recharge_response`.`unique_id` = '$_GET[ref_no]';";
    		$con->query($reef);
    		$con->query($sav);
    		$con->query($savw);
    		distribute_recharge_income($_SESSION[d_id],$dpoi[amount],$unq_id);
    		echo "<script>location.href='dth_recharge.php?status=s';</script>";
            
        }elseif($obj->TRNSTATUS == "0")
        {echo "<script>location.href='dth_recharge.php?s=p';</script>";
        }
        elseif($obj->TRNSTATUS == "2")
        {echo "<script>location.href='dth_recharge.php?s=p';</script>";
        }
        elseif($obj->TRNSTATUS == "3")
        {echo "<script>location.href='dth_recharge.php?s=p';</script>";
        }
        elseif($obj->TRNSTATUS == "4")
        {echo "<script>location.href='dth_recharge.php?s=p';</script>";
        }
        elseif($obj->TRNSTATUS == "5")
        {echo "<script>location.href='dth_recharge.php?s=p';</script>";
        }
        elseif($obj->TRNSTATUS == "6")
        {echo "<script>location.href='dth_recharge.php?s=p';</script>";
        }
            else{
        echo "<script>location.href='dth_recharge.php?status=f';</script>";
    }
?>