<?php include "config.php";
$pin_amount=$_POST[pins]*1180;
    $pin_c=$pin_amount*5/100;
    if($d_detail[pan_a]=='y')
    {
        $pin_tds=($pin_amount+$pin_c)*5/100;
    }else{$pin_tds=($pin_amount+$pin_c)*20/100;}
    $pin_tot_amount=$pin_amount+$pin_c+$pin_tds;
    ?>
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
                <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-area">
                                    <div class="invoice-head">
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <span>INVOICE</span>
                                            </div>
                                            <div class="iv-right col-6 text-md-right">
                                                <span>&nbsp;</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="invoice-address">
                                                <h3>invoiced to</h3>
                                                <h5><?php echo $d_detail[name];?></h5>
                                                <p><?php echo $d_detail[addreass];?></p>
                                                <p><?php echo $d_detail[city]." ".$d_detail[state];?></p>
                                                <p><?php echo $d_detail[india];?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <ul class="invoice-date">
                                                <li>Invoice Date : <?php echo $date;?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="invoice-table table-responsive mt-5">
                          <table class="table table-bordered table-hover text-right">
                            <thead>
                              <tr class="text-capitalize">
                                <th class="text-center" style="width:5%;">QTY</th>
                                <th class="text-left" style="width: 45%; min-width: 130px;">Product Name</th>
                                <th>Subtotal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="text-center"><?php echo $_POST[pins];?></td>
                                <th class="text-left">PIN</th>
                                <th><?php echo $pin_amount;?> Rs</th>
                              </tr>
                            </tbody>
                            <tfoot>

                                <tr>
                                  <th colspan="2">Subtotal:</th>
                                  <td><?php 
                                echo $pin_amount;?> Rs</td>
                                </tr>
                                <tr>
                                  <th colspan="2">Pin Generation Charge (5%)</th>
                                  <td><?php echo $pin_c;?>Rs</td>
                                </tr>
                                <tr>
                                   <?php if($d_detail[pan_a]=='y')
                                    { $tds_per=5;}
                                    else{$tds_per=20;}?>
                                  <th colspan="2">TDS (<?php echo $tds_per;?>%)</th>
                                  <td><?php echo $pin_tds;?>Rs</td>
                                </tr>
                                <tr>
                                  <th colspan="2">Total:</th>
                                  <th><?php echo $pin_tot_amount;?> Rs</th>
                                </tr>
                            </tfoot>
                          </table>
                                        
                                    </div>
                                </div>
                                <div class="invoice-buttons text-right">
                                    <form action="process_buy_pin.php" method="post">
                                          <input type="hidden" name="pins" value="<?php echo $_POST[pins];?>">
                                      
                          <input type="submit" name="confirm_buy_pin" value="Confirm Buy Pins" class="btn btn-round btn-primary">
                          </form>
                                </div>
                            </div>
                        </div>
                    </div>
                            <!-- Textual inputs end -->
                
                
                </div>
               
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
