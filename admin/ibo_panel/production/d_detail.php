<?php include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Distributor Detail </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
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
                <h3>distributor Detail</h3>
              </div>
            </div>

            <div class="clearfix"></div>




            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>distributor Detail</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                     <table class="table table-striped table-bordered">
                      
                          <?php 
                            
                                $e="SELECT * FROM `distributor` WHERE `d_id`='$_GET[d_id]'";
                                $d=$con->query($e);
                              
                                $R=mysqli_fetch_assoc($d); ?>
                          
                <tr><th>ID No.</th><td><?php echo $R["d_id"]; ?></td></tr>
                <tr><th>Sponser ID</th><td><?php echo $R["s_id"]; ?></td></tr>
                <tr><th>Name</th><td><?php echo $R["name"]; ?></td></tr>
                <tr><th>Mobile</th><td><?php echo $R["mobile"]; ?></td></tr>
                <tr><th>Alt Mobile</th><td><?php echo $R["a_mobile"]; ?></td></tr>
                <tr><th>D.O.B</th><td><?php echo $R["dob"]; ?></td></tr>
                <tr><th>Addreass</th><td><?php echo $R["addreass"]; ?></td></tr>
                <tr><th>City, State</th><td><?php echo $R["city"].", ".$R["state"]; ?></td></tr>
                <tr><th>Pancard No.</th><td><?php echo $R["pancard"]; ?></td></tr>
                <tr><th>Adhar Card No.</th><td><?php echo $R["adhar_card_no"]; ?></td></tr>
                <tr><th>Registration Date/time</th><td><?php echo $R['r_date']." / ".$R['r_time']; ?></td></tr>
                <tr><th>Active Status (date/time)</th><td><?php   if($R[a_status]=='y')
                                        { ?> </a> <?php echo "<button type='button' class='btn btn-success'>Active</button>"; }
                                    else {?> <button type="button" class="btn btn-danger">Not Active</button> 
                                    <?php    
                                    } 
                                    echo " ".$R['a_date']." / ".$R['a_time'];
                                    ?></td></tr>
                <tr><th>Income Wallet</th><td><?php echo $R['withdrawal_wallet']+0; ?> &nbsp;&nbsp;<a href="add_remove_income_wallet.php?d_id=<?php echo $R['d_id']; ?>">Add/Remove</a></td></tr>
                <tr><th>Withdrawal Wallet</th><td><?php echo $R['main_wallet']+0; ?> &nbsp;&nbsp;<a href="add_remove_withdrawal_wallet.php?d_id=<?php echo $R['d_id']; ?>">Add/Remove</a></td></tr>
                <tr><th>Pin Wallet</th><td><?php echo $R['pin_wallet']+0; ?> &nbsp;&nbsp;<a href="add_remove_pin.php?d_id=<?php echo $R['d_id']; ?>">Add/Remove</a></td></tr>
                <tr><th>UPin Wallet</th><td><?php echo $R['u_pin_wallet']+0; ?> &nbsp;&nbsp;<a href="add_remove_upin.php?d_id=<?php echo $R['d_id']; ?>">Add/Remove</a></td></tr>
                <tr><th>2500 Pin Wallet</th><td><?php echo $R['pin_2_wallet']+0; ?> &nbsp;&nbsp;<a href="add_remove_pin2500.php?d_id=<?php echo $R['d_id']; ?>">Add/Remove</a></td></tr>
                <tr><th>3600 Pin Wallet</th><td><?php echo $R['pin_3_wallet']+0; ?> &nbsp;&nbsp;<a href="add_remove_pin3600.php?d_id=<?php echo $R['d_id']; ?>">Add/Remove</a></td></tr>
                <tr><th>Playing Coin</th><td><?php echo $R['ludo_coin']+0; ?> &nbsp;&nbsp;<a href="add_remove_playing_coin.php?d_id=<?php echo $R['d_id']; ?>">Add/Remove</a></td></tr>
                <tr><th>Redeem Coin</th><td><?php echo $R['ludo_wallet']+0; ?> &nbsp;&nbsp;<a href="add_remove_redeem_coin.php?d_id=<?php echo $R['d_id']; ?>">Add/Remove</a></td></tr>
                          
                    </table>
                    
                    <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                    <h2>ID Block / Unblock </h2>
                     <?php 
                    
                                if($R[block_status]!='N')
                                {?>
                                <form action="process_id_deactivate.php" method="get">
                                    <input type="hidden" name="d_id" value="<?php echo $R[d_id];?>">
                                    <input type="text" name="b_note">
                                    
                                    <input type="submit" name="status" class='btn btn-danger' value="deactivate">
                                </form>
                                <?php }
                                else{ ?> 
                                <form action="process_id_deactivate.php" method="get">
                                    <input type="hidden" name="d_id" value="<?php echo $R[d_id];?>">
                                    <input type="text" name="b_note">
                                    <input type="submit" name="status" class='btn btn-success' value="activate">
                                </form>
                                <?php }
                                ?>
                                <a href="block_reason_list.php?d_id=<?php echo $R[d_id];?>">Block History</a>
                                <br>&nbsp;<br>&nbsp;<br>&nbsp;
                                <h2>Edit Distributor Profile </h2>
                    <a href="process_edit_profile.php?d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-success'>Edit </button></a>


                    <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>
                    <h2>Aadhar Pan Bank Details</h2>
                    
                    <table id="datatable" class="table table-striped table-bordered">
                        
                    <?php $a="SELECT * FROM `kyc_adhar` WHERE `d_id`='$_GET[d_id]' and `status`='c'";
                          $s=$con->query($a);
                          $d=mysqli_fetch_assoc($s)?> 
                        <tr>
                            <th>Aadhar</th>
                            <td><?php if($s->num_rows==0){ echo "The Associate KYC has not been approved";} 
                                else{?> <a href="../../../ibo_panel/production/adhar_card_img/<?php echo $_GET[d_id];?>f.jpg"  target="_blank">Click here to view adhar card front image</a><br><a href="../../../ibo_panel/production/adhar_card_img/<?php echo $_GET[d_id];?>b.jpg"  target="_blank">Click here to view adhar card back image</a><?php } ?></td>
                                
                          <td><?php if($s->num_rows!=0){ ?><a href="kyc_adhar.php?d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-danger'>Reject</button></a><?php } ?></td>
                          
                          
                          
                        </tr>
                        <?php $b="SELECT * FROM `kyc_pan` WHERE `d_id`='$_GET[d_id]' and `status`='c'";
                          $t=$con->query($b);
                          $e=mysqli_fetch_assoc($t)?>
                        <tr>
                            <th>Pan</th>
                            <td><?php if($t->num_rows==0){ echo "The Associate KYC has not been approved";} 
                                else{?> <a href="../../../ibo_panel/production/pan_card_img/<?php echo $_GET[d_id];?>.jpg"  target="_blank">Click here to view adhar card front image</a><?php } ?></td>
                          <td><?php if($t->num_rows!=0){ ?><a href="kyc_pan.php?d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-danger'>Reject</button></a><?php } ?></td>
                          
                          
                          
                        </tr>
                        
                        <?php $c="SELECT * FROM `kyc_bank` WHERE `d_id`='$_GET[d_id]' and `status`='c'";
                          $u=$con->query($c);
                          $f=mysqli_fetch_assoc($u)?>
                        <tr>
                            <th>Bank</th>
                            <td><?php if($u->num_rows==0){ echo "The Associate KYC has not been approved";} 
                                else{?> <a href="../../../ibo_panel/production/bank_img/<?php echo $_GET[d_id];?>.jpg" target="_blank">Click here to view Bank Passbook image</a><?php } ?></td>
                          <td><?php if($u->num_rows!=0){ ?><a href="kyc_bank.php?d_id=<?php echo $R[d_id];?>"><button type='button' class='btn btn-danger'>Reject</button></a><?php } ?></td>
                          
                          
                          
                        </tr>
                      


                      
                     </table>  
                  
                    
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            © 2020 DreamWay Sure. All Rights Reserved</a>
          </div>
          <div class="clearfix"></div>
        </footer>
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
