<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../../small_logo.jpg" type="image/ico" />
    <title>Dreamsway || Pin Genarate</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php include "include/sidebar.php";?>
          </div>
        </div>

        <!-- top navigation -->
        <?php include "include/header.php";?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Generate Pin</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
            <!-- price element -->
                        <div class="col-md-4 col-sm-6  ">
                          <div class="pricing">
                            <div class="title">
                              <h2>Pin Wallet (1180 Rs)</h2>
                              <h1><?php echo $d_detail[pin_wallet];?></h1>
                              <span>Pins</span>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-circle"></i> 1000 <strong> Shopping </strong></li>
                                    <li><i class="fa fa-circle"></i> 200 Rs <strong> Level 1 </strong></li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                  <p>Buy 1180 Pins</p>
                <form action="confirm_generate_pin.php" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 ">
                          <input type="number" placeholder="Pins" required="required" class="form-control" name="pins" min="0">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      
                          <input type="submit" class="btn btn-success btn-block" name="pin_generate_wallet" value="Buy Pins">
                          
                        
                      </form>
                                
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->
                        <!-- price element -->
                        <div class="col-md-4 col-sm-6  ">
                          <div class="pricing">
                            <div class="title">
                              <h2>Pin Wallet (2500 Rs)</h2>
                              <h1><?php echo $d_detail[pin_2_wallet]+0;?></h1>
                              <span>Pins</span>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-circle"></i> 0 <strong> Shopping </strong></li>
                                    <li><i class="fa fa-circle"></i> 500 Rs <strong> Level 1 </strong></li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <p>Buy 2600 Pins</p>
                                  <form data-parsley-validate class="form-horizontal form-label-left" action="confirm_generate_pin2600.php" method="post">

                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 ">
                          <input type="number" placeholder="Pins" required="required" class="form-control" name="pins" min="0">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      
                          <input type="submit" class="btn btn-success btn-block" name="pin_generate_wallet" value="Buy Pins">
                          
                        
                      </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->
                        <!-- price element -->
                        <div class="col-md-4 col-sm-6  ">
                          <div class="pricing">
                            <div class="title">
                              <h2>Pin Wallet (3600 Rs)</h2>
                              <h1><?php echo $d_detail[pin_3_wallet]+0;?></h1>
                              <span>Pins</span>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                   <li><i class="fa fa-circle"></i> 0 <strong> Shopping </strong></li>
                                    <li><i class="fa fa-circle"></i> 600 Rs <strong> Level 1 </strong></li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <p>Buy 3600 Pins</p>
                                  <form data-parsley-validate class="form-horizontal form-label-left" action="confirm_generate_pin3600.php" method="post">

                      <div class="item form-group">
                        <div class="col-md-12 col-sm-12 ">
                          <input type="number" placeholder="Pins" required="required" class="form-control" name="pins" min="0">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      
                          <input type="submit" class="btn btn-success btn-block" name="pin_generate_wallet" value="Buy Pins">
                          
                        
                      </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->
                
                </div>
                </div>
                
               </div> 
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pin Purchased History</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <br>
            <div class="card-box table-responsive">
        <table class="table table-striped table-bordered" id="datatable">
            <thead><tr><th>Sr. no.</th><th>Date / Time</th><th>pin</th><th>Amount</th><th>Charge</th><th>tds</th><th>Total Amount</th></tr></thead>
            <?php
            $a=0;
            $g="SELECT * FROM `buy_pin_history` WHERE `d_id`='$_SESSION[d_id]'";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $d[date]." / ".$d[time];?></td>
                <td><?php echo $d[pin_qty];?></td>
                <td><?php echo $d[amount];?></td>
                <td><?php echo $d[pin_gen_charge];?></td>
                <td><?php echo $d[tds_cut];?></td>
                <td><?php echo $d[total_amount];?></td>
            </tr>
            <?php
            }?>
        </table>
        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include "include/footer.php";?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>