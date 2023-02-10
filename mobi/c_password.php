<?php include "config.php";?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dreamsway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php include "include/sidebar.php";?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include "include/header.php";?>
            <!-- header area end -->
            <!-- page title area start -->
            <!-- page title area end -->
            <div class="main-content-inner">
             <div class="row">
                
                <!-- Textual inputs start -->
                <div class="col-12 mt-12">
                    <div class="card">
                        <div class="card-body">
                            <h4> Change Password </h4>
                            <br>&nbsp;
                            <?php if($_GET[s]=="s")
                            {?>
                            <div class="alert alert-success" role="alert">
                                            <strong>Success!</strong> Your Profile Updated
                            </div>
                            <?php } elseif($_GET[s]=="f"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> Please Try again
                                        </div>
                           <?php } elseif($_GET[s]=="c_pass"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> new password and confirm password not matched
                                        </div>
                           <?php }elseif($_GET[s]=="o_pass"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> Old Password is incorrect
                                        </div>
                           <?php }?>
                           <br>&nbsp;
                            
                            
                            <form class="form-horizontal form-label-left" method="post">
                      
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Old Password</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="password" class="form-control" name="old_pass">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">New Password</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="password" class="form-control" name="n_pass">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Confirm Password</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="password" class="form-control" name="c_pass" >
                          
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <div class="col-md-12 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Change Password" name="submit_pass">
                        </div>
                      </div>
                     </form> 
                        </div>
                    </div>
                </div>
                            <!-- Textual inputs end -->
                
                
                </div>
                <?php
            if(isset($_POST[submit_pass]))
            {
                
                if($_POST[old_pass]==$_SESSION[d_password])
                {
                    if($_POST[n_pass]==$_POST[c_pass])
                    {
						//echo $con;
				$update_query="UPDATE `distributor` SET `password` = '$_POST[n_pass]' WHERE `distributor`.`d_id` = $_SESSION[d_id];";
							if($con->query($update_query) === TRUE)
							{
								$_SESSION[d_password]=$_POST[n_pass];
								echo "<script>location.href='c_password.php?s=s';</script>";
							}
						 	else
							{
							 	echo "<script>location.href='c_password.php?s=f';</script>";
						 	}
               
                    }else{echo "<script>location.href='c_password.php?s=c_pass';</script>";}
                }
                else{echo "<script>location.href='c_password.php?s=o_pass';</script>";
                }
                
                
                
                
            }
            ?>
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
       <?php include "include/footer.php";?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
