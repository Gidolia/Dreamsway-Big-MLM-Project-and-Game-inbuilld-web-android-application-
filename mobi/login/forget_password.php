<?php include "../../database_connect.php";
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Dreamsway || Forget Password</title>

	<!-- Meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Style -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	
</head>

<body>
	<!-- login form -->
	<section class="w3l-login">
		<div class="overlay">
			<div class="wrapper">
				<div class="logo">
					<a class="brand-logo" href="index.php">Dreamsway
					</a>
				</div>
				<div class="form-section">
					<h3>Forget Password</h3>
					
					<form action="#" method="post" class="signin-form">
						<div class="form-input">
							<input type="text" name="id" placeholder="Userid" required="" autofocus>
						</div>
						
						<button type="submit" class="btn btn-primary theme-button mt-4" name="sub_login">Send Password</button>
						<div class="new-signup">
							<a href="index.php" class="signuplink">Or Login</a>
						</div>
					</form>
					<?php
	function isNumber($c) {
        return preg_match('/[0-9]/', $c);
    }
if(isset($_POST[sub_login]))
{
        $string=$_POST[id];
       
    $chars = '';
    $d_id = '';
    for ($index=0;$index<strlen($string);$index++) {
        if(isNumber($string[$index]))
        {
            $d_id .= $string[$index];
        }
        else {
            $chars .= $string[$index];}
        
    }
    if($chars=="DS" || $chars=="ds")
    {
        $sel="SELECT * FROM `distributor` WHERE `d_id`='$d_id'";
        $res=$con->query($sel);
        if ($res->num_rows > 0)
        {
            $rdff=$res->fetch_assoc();
          
          $dd="Your Password is ".$rdff[password];
          $dd = str_replace(' ', '%20', $dd);
	$url = 'http://sms.hspsms.com/sendSMS?username=dreamsway&message='.$dd.'&sendername=DREAMS&smstype=TRANS&numbers='.$rdff[mobile].'&apikey=a238e924-ad9e-43aa-80c4-8e8d51ba092b';
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	
	$sms_query="INSERT INTO `sms_handling` (`sh_id`, `d_id`, `message`, `date`, `time`, `response`, `mobile`, `session_d_id`) VALUES (NULL, '$d_id', '$dd', '$date', '$time', '$response', '$mobile', '$d_id');";
	$con->query($sms_query);
	
           echo "<script>location.href='index.php';</script>";
        }
        else{
          	echo "<script>location.href='index.php';</script>";
        }
    }
    else{
          	echo "<script>location.href='index.php';</script>";
        }
}
?>	
					<p class="signup">Don’t have account? <a href="signup.php" class="signuplink">Sign-up</a></p>
				</div>
			</div>
		</div>
		<div id='stars'></div>
		<div id='stars2'></div>
		<div id='stars3'></div>
	</section>
<!-- copyright -->
    <section class="w3l-copyright" style="">
        <div class="container">
            <div class="row bottom-copies">
                <p class="col-lg-8 copy-footer-29" style="text-align: center">© All rights reserved to Dreamsway</p>
            </div>
        </div>

	
	<!-- /login form -->
</body>

</html>