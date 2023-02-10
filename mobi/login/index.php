<?php include "../../database_connect.php";
session_start();
session_destroy();
?>
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
					<h3>Login</h3>
					<h6>To continue with Us</h6>
					<form action="#" method="post" class="signin-form">
						<div class="form-input">
							<input type="text" name="id" placeholder="Userid" required="" autofocus>
						</div>
						<div class="form-input">
							<input type="password" name="password" placeholder="Password" required="">
						</div>
						<label class="check-remaind">
							<input type="checkbox">
							<span class="checkmark"></span>
							<p class="remember">Remember me</p>
						</label>
						<button type="submit" class="btn btn-primary theme-button mt-4" name="sub_login">Log in</button>
						<div class="new-signup">
							<a href="forget_password.php" class="signuplink">Forgot username or password?</a>
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
    session_start();
    if($chars=="DS" || $chars=="ds")
    {
        $sel="SELECT * FROM `distributor` WHERE `d_id`='$d_id' AND `password`='$_POST[password]'";
        $res=$con->query($sel);
        if ($res->num_rows > 0)
        {
          $_SESSION[d_id]=intval($d_id);
          $_SESSION[d_password]=$_POST[password];
          
          //echo $_SESSION[d_id];
    	  //echo $_SESSION[d_password];
          echo "<script>location.href='../mob/production/plain_page.php';</script>";
        }
        else{
          	echo "<script>alert('Invalid user name or Password');
        	location.href='index.php';</script>";
        }
    }
    else{
          	echo "<script>alert('Invalid user name or Password');
        	location.href='index.php';</script>";
        }
}
?>
					
					
					<p class="signup">Don’t have account yet? <a href="signup.php" class="signuplink">Sign Up</a></p>
				</div>
			</div>
		</div>
		<div id='stars'></div>
		<div id='stars2'></div>
		<div id='stars3'></div>

		<!-- copyright -->
	<section class="w3l-copyright">
        <div class="container">
            <div class="row bottom-copies">
                <p class="col-lg-8 copy-footer-29">© All rights reserved to Dreamsway.</p>

               
            </div>
        </div>
		<!-- //copyright -->
	</section>

	<!-- /login form -->
</body>

</html>