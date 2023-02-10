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
                            <h4> Edit Profile </h4>
                            <br>&nbsp;
                            <?php if($_GET[s]=="s")
                            {?>
                            <div class="alert alert-success" role="alert">
                                            <strong>Success!</strong> Your Profile Updated
                            </div>
                            <?php }elseif($_GET[s]=="f"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> Please Try again
                                        </div>
                           <?php }?>
                                        <br>&nbsp;
                            <form method="post">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">ID</label>
                               <div class="col-md-12 col-sm-12 col-xs-12">
                                   <input type="text" class="form-control" name="ifbo_id" value="DS<?php echo $_SESSION[d_id];?>" readonly>
                          <input type="hidden" class="form-control" name="ibo_id" value="<?php echo $_SESSION[d_id];?>" readonly>
                            </div>
                          </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Name</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="ibo_name" value="<?php echo $d_detail[name];?>" readonly>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Mobile</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="number" class="form-control" name="mobile" value="<?php echo $d_detail[mobile];?>" readonly>
                        
                            </div>
                           </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3"> Addreass</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" name="addreass" required value="<?php echo $d_detail[addreass];?>" <?php echo $a;?>>
                         
                        </div>
                            </div>
                            <div class="form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-3"> City</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <input type="text" class="form-control" name="city" required value="<?php echo $d_detail[city];?>" <?php echo $a;?>>
                         
                        </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">State</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                      
			            <input type="text" class="form-control" name="state" value="<?php echo $d_detail[state];?>" required >
                          
                        </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Email</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="email" class="form-control" name="email" value="<?php echo $d_detail[email];?>" required >
                          
                        </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Pancard No.</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" maxlength="10" name="pancard" value="<?php echo $d_detail[pancard_no];?>" required >
                          
                        </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Nominee Name</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" maxlength="10" name="nominee" value="<?php echo $d_detail[	nominee];?>" required >
                          
                        </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-3">Nominee Relation</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" maxlength="10" name="nominee_relation" value="<?php echo $d_detail[nominee_relation];?>" required >
                          
                        </div>
                            </div>
                            
                            <?php
                      $sqlwwww="SELECT * FROM `distributor` WHERE `d_id`='$d_detail[s_id]'";
                      $gbk=$con->query($sqlwwww);
                      $mjhy=mysqli_fetch_assoc($gbk);
                      ?>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3"> My Sponser Detail</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                         <input type="email" class="form-control" name="sponser_id" readonly value="<?php echo $mjhy[name]." (DS".$d_detail[s_id].")";?>">
                        </div>
                        </div>
                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-3">
                              <input type="submit" class="btn btn-success" value="Update Profile" name="submit_profile">
                             </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                            <!-- Textual inputs end -->
                 <?php
            if(isset($_POST[submit_profile]))
            {
               $update_query="UPDATE `distributor` SET `addreass` = '$_POST[addreass]', `city` = '$_POST[city]', `email` = '$_POST[email]', `state` = '$_POST[state]', `pancard_no`= '$_POST[pancard]', `pan_a`='y', `nominee`= '$_POST[nominee]', `nominee_relation`= '$_POST[nominee_relation]' WHERE `distributor`.`d_id` = $_SESSION[d_id];";
							if($con->query($update_query) === TRUE)
							{
								echo "<script>location.href='profile_update.php?s=s';</script>";
							}
						 	else
							{
							    $dd="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'update query', '', 'y');";
							    $con->query($dd);
							 	echo "<script>location.href='profile_update.php?s=f';</script>";
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
