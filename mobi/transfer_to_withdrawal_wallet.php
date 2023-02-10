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
                            <h4> Transfer Income Wallet to Withdrawal Wallet </h4>
                            <br>&nbsp;
                            <?php if($_GET[s]=="s")
                            {?>
                            <div class="alert alert-success" role="alert">
                                            <strong>Success!</strong> Amount Transfered
                            </div>
                            <?php }elseif($_GET[s]=="q_f"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> Please Try again
                                        </div>
                           <?php }elseif($_GET[s]=="n_id"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> ID Must be Activate
                                        </div>
                           <?php }elseif($_GET[s]=="u_bal"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> You Dont Have Balance
                                        </div>
                           <?php }?>
                                        <br>&nbsp;
                            <div class="col-md-6 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-shopping-cart"></i>Income Wallet</div>
                                           <h2>
                                              <?php echo $d_detail[withdrawal_wallet];?> 
                                           </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-6 mb-6">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fa fa-money"></i> Withdrawal Wallet</div>
                                            <h2><?php echo $d_detail[main_wallet];?></h2>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <br>&nbsp;<br>&nbsp;
                            <form class="form-horizontal form-label-left" method="post" action="process_transfer_iw_ww.php">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Amount</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="number" class="form-control" name="amount" min="500" required>
                          
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-md-12 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Send To Withdrawal Wallet" name="wallet_transfer">
                        </div>
                      </div>
                     </form>
                        </div>
                    </div>
                </div>
                            <!-- Textual inputs end -->
                 
                <!-- row area start-->
            </div>
        </div>
        <div class="main-content-inner">
                <div class="row">
                <!-- Textual inputs start -->
                <div class="col-12 mt-12">
                    <div class="card">
                        <div class="card-body">
                            <h4> Pin Used History</h4>
                            <br>&nbsp;
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" value ="<h2>Withdrawl history</h2>" id="datatable">
            <thead><tr><th width="8%">Sr. no.</th><th width="15%">Date / Time</th><th width="15%">Activated ID</th><th>Activated Name</th><th width="8%">pin</th></tr></thead>
            <?php
            $a=0;
            $g="SELECT * FROM `pin_wallet` WHERE `d_id`='$_SESSION[d_id]' AND `note`='used' ORDER BY `pin_wallet`.`pw_id` DESC";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $d[date]." / ".$d[time];?></td>
                
                <td><?php echo "DS".$d[pin_used];?></td>
                <?php
                $axxx="SELECT * FROM `distributor` WHERE `d_id`='$d[pin_used]'";
                $cdcd=$con->query($axxx);
                $cscs=$cdcd->fetch_assoc();
                ?>
                <td><?php echo $cscs[name];?></td>
                <td><?php echo $d[pin_qty];?></td>
                
            </tr>
            <?php
            }?>
        </table>
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
