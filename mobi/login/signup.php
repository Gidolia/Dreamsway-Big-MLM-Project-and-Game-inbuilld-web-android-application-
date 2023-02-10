<?php include "../../database_connect.php";?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Dreamsway || Login</title>

	<!-- Meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Style -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	    <script>
    function validateForm() {
 	var ser_name = document.forms["myForm"]["s_name"].value;
	var password = document.forms["myForm"]["password"].value;
	var c_password = document.forms["myForm"]["c_password"].value;
	var mobile_no = document.forms["myForm"]["mobile_ck"].value;
	if(mobile_no=="This Mobile Number is Already Register")
	{
	    document.getElementById("text_mob").innerHTML = " This Mobile Number is Already Register ";
    return false;
	}
	if(mobile_no=="Please Check Your Mobile Number")
	{
	    document.getElementById("text_mob").innerHTML = " Please Check Your Mobile Number ";
    return false;
	}
	  if (password != c_password)
		  {
    document.getElementById("cp_msg").innerHTML = " Confirm Password didnt matched to password ";
    return false;
		  }
		  
	
	if(ser_name == "")
		{
			document.getElementById("upline_msg").innerHTML = " Please Check Upline no. ";
			return false;
		}
	if(ser_name == "Please check your upline number")
		{
			document.getElementById("upline_msg").innerHTML = " Please Check Upline no. ";
			return false;
		}
}
   function showHint(str) {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").value = this.responseText;
		 // document.getElementById("txtg").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "get_name.php?q=" + str, true);
    xmlhttp.send();
  
}
function showHint_mob(str) {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint_mob").value = this.responseText;
        if(this.responseText != "Correct")
				{
					document.getElementById("text_mob").innerHTML = this.responseText;
				}
		else{ document.getElementById("text_mob").innerHTML = "";
		}
        
      }
    };
    xmlhttp.open("GET", "get_hint_mob.php?q=" + str, true);
    xmlhttp.send();
  
}

</script>
</head>

<body>
	<!-- login form -->
	<section class="w3l-login">
		<div class="overlay">
			<div class="wrapper">
				<div class="logo">
					<a class="brand-logo" href="index.php">Dreamsway</a>
				</div>
				<div class="form-section">
					<h3>New Member</h3>
					<h6>To continue with Us</h6>
					<form action="#" method="post" class="signin-form" name="myForm" onsubmit="return validateForm()">
						<div class="form-input">
							<input type="text" name="s_id" placeholder="Sponser ID" required="" value="<?php echo $_GET[d_id];?>"  onKeyUp="showHint(this.value)" autofocus>
						</div>
						<div class="form-input">
							<input type="text" name="s_name" placeholder="Sponser Name" id="txtHint" required="" readonly>
							<span id="upline_msg" style="color: red"></span>
						</div>
						<div class="form-input">
							<input type="text" name="name" placeholder="Name" required="">
							
						</div>
						<div class="form-input">
							<input type="text" name="mobile" placeholder="Mobile No." required=""  onKeyUp="showHint_mob(this.value)">
							<span id="text_mob" style="color: red"></span>
								<span id="text_mobw" style="color: red"></span>
								<input type="hidden" name="mobile_ck" value="Please Check Your Mobile Number" id="txtHint_mob" readonly />
							
						</div>
						<div class="form-input">
							<input type="password" name="password" placeholder="Password" required="">
						</div>
						<div class="form-input">
							<input type="password" name="c_password" placeholder="Confirm Password" required="">
							<span id="cp_msg" style="color: red"></span>
						</div>
						
						<button type="submit" class="btn btn-primary theme-button mt-4" name="sub_reg">Register ID</button>
						<div class="new-signup">
							<a href="#reload" class="signuplink">Forgot username or password?</a>
						</div>
					</form>
	<?php
	if(isset($_POST[sub_reg]))
	{
	    function isNumber($c) {
            return preg_match('/[0-9]/', $c);
        }
        
            $string=$_POST[s_id];
               
            $chars = '';
            $ssd_id = '';
            for ($index=0;$index<strlen($string);$index++) {
                if(isNumber($string[$index]))
                {
                    $ssd_id .= $string[$index];
                }
                else {
                    $chars .= $string[$index];}
            
            }
            
            
            //////////////////////////////
function password_generate($chars) 
{
  $data = '123456789';
  return substr(str_shuffle($data), 0, $chars);
}
for($x=0; $x<100; $x++)
{
    //echo $x;
    $d_id=password_generate(6);
    $sqsqqs="SELECT * FROM `distributor` WHERE `d_id`='$d_id'";
    $qur=$con->query($sqsqqs);
    if(mysqli_num_rows($qur)==0)
    {
        break;
    }
}

	    $s_d="SELECT * FROM `distributor` WHERE `d_id`='$ssd_id'";
	    $d=$con->query($s_d);
	    if($d->num_rows>0)
	    {
	        if($_POST[password]==$_POST[c_password])
	        {
	           
	            $ss="INSERT INTO `distributor` (`d_id`, `s_id`, `name`, `dob`, `mobile`, `a_mobile`, `password`, `addreass`, `city`, `state`, `pancard_no`, `adhar_card_no`, `reg_date`, `reg_time`, `a_status`, `a_date`, `a_time`, `withdrawal_wallet`, `recharge_wallet`, `ludo_wallet`, `pin_wallet`, `pan_a`, `tds_wallet`, `block_status`, `shoping_point`, `kyc_status`, `main_wallet`) VALUES ('$d_id', '$ssd_id', '$_POST[name]', '', '$_POST[mobile]', '', '$_POST[password]', '', '', '', '', '', '$date', '$time', 'n', '', '', '0', '0', '0', '0', 'n', '0', 'n', '0', 'n', '0');";
	            if($con->query($ss)===TRUE)
	            {
	                echo "<script>location.href='signup_detail.php?d_id=".$d_id."';</script>";
	            }
	            else{
	                $ef="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'New Registration');";
	                $con->query($ef);
	                echo "<script>alert('Query Failed! Plz try again');location.href='signup.php';</script>";
	                
	            }
	        }else{echo "<script>alert('Password And Confirm Password Did not Matched');location.href='signup.php';</script>";}
	    }else{echo "<script>alert('Sponser Is incorrect plz try Again');location.href='signup.php';</script>";}
	}
	?>
					<p class="signup">Already Have Account? <a href="index.php" class="signuplink">Log IN</a></p>
				</div>
			</div>
		</div>
		<div id='stars'></div>
		<div id='stars2'></div>
		<div id='stars3'></div>

	</section>
	<!-- copyright -->
   <section class="w3l-copyright">
        <div class="container">
            <div class="row bottom-copies">
                <p class="col-lg-8 copy-footer-29">© All rights reserved to Dreamsway. Design by <a href="http://dreamsway.in/web/">Dreamsway</a></p>

               
            </div>
        </div>
	<!-- /login form -->
</body>

</html>