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
                            <h4> Pin Ledger View</h4>
                            <br>&nbsp;
                          
        <div class="single-table">
            <div class="table-responsive">
        <table class="table table-striped table-bordered jambo_table" id="datatable">
            <thead><tr class="headings"><th width="10%">Sr. no.</th><th>Date / Time</th><th>PIN</th><th>Status</th><th>From ID</th><th>To ID</th><th>Activate ID</th><th>Note</th></tr></thead>
            <tbody>
            <?php
            $a=0;
            $g="SELECT * FROM `pin_wallet` WHERE `d_id`='$_SESSION[d_id]'";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $d[date]." / ".$d[time];?></td>
                <th><?php echo $d[pin_qty];?></th>
                <td><?php if($d[type]=="+"){?>
                <font style="color:green;">Credit</font><?php 
                }else{?><font style="color:red;">Debit</font>
                <?php }?></td>
                <td>
                    <?php
                $axxx="SELECT * FROM `distributor` WHERE `d_id`='$d[from_d_id]'";
                $cdcd=$con->query($axxx);
                $cscs=$cdcd->fetch_assoc();
                if($d[from_d_id]!=""){
                echo "DS".$d[from_d_id]." (".$cscs[name].")";
                }?></td>
                <td><?php if($d[to_d_id]!=""){
                echo $d[to_d_id];}?></td>
                <td>DS<?php
                $axxx="SELECT * FROM `distributor` WHERE `d_id`='$d[pin_used]'";
                $cdcd=$con->query($axxx);
                $cscs=$cdcd->fetch_assoc();
                echo $d[pin_used]." (".$cscs[name].")";?></td>
                <td><?php echo $d[note];?></td>
            </tr>
            <?php
            }?>
            </tbody>
        </table></div></div>
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
