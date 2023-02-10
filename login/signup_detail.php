<?php include "../database_connect.php";?>
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
					<a class="brand-logo" href="#">Dreamsway</a>
				</div>
				<div class="form-section">
				    <?php
				    $s_d="SELECT * FROM `distributor` WHERE `d_id`='$_GET[d_id]'";
            	    $d=$con->query($s_d);
            	    if($d->num_rows>0)
            	    {
            	    $fet=$d->fetch_assoc();
            	    ?>
					<h3>Success !</h3>
					<h6>New Member Added Successfully</h6>
					<table border="1" width="100%">
					    <tr><th>ID No.</th><th>DS<?php echo $_GET[d_id];?></th></tr>
					    <tr><th>Name</th><th><?php echo $fet[name];?></th></tr>
					    <tr><th>Registration Date</th><th><?php echo $fet[reg_date];?></th></tr>
					</table>
					<?php }?>
					<p class="signup">Already Have Account? <a href="index.php" class="signuplink">login</a></p>
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
                <p class="col-lg-8 copy-footer-29">© All rights reserved to Dreamsway. Designed by <a href="http://dreamsway.in/web/">Dreamsway</a></p>

               
            </div>
        </div>
		<!-- //copyright -->
	</section>

	<!-- /login form -->
</body>

</html>