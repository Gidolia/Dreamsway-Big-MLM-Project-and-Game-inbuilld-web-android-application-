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
<link rel="icon" href="../../small_logo.jpg" type="image/ico" />
    <title>Dreamsway </title>

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
                <h3>Adharcard Requests</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>




            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Adharcard Request</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                     <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Request ID</th>
                          <th>D ID</th>
                          <th>Name</th>
                          <th>Aadhar Number</th>
                          <th>Date / Time</th>
                          <th>Front Image</th>
                          <th>Back Image</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                            
                                $e="SELECT * FROM `kyc_adhar` WHERE `status`='p'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                $fv="SELECT * FROM `distributor` WHERE `d_id`='$R[d_id]'";
                                $dc=$con->query($fv);
                                $ssss=mysqli_fetch_assoc($dc);
                                
                                ?>
                                    <tr>
                                        <td> <?php echo $R['ka_id']; ?></td>
                                <td>
                                    <?php echo $R['d_id']; ?>
                                </td>
                                <td>
                                    <?php echo $ssss['name']; ?>
                                </td>
                                <td>
                                  <?php echo $ssss['adhar_no'];?>
                                </td>
                                
                                <td>
                                    <?php echo $R['date']." / ".$R['time']; ?>
                                </td>
                                <td>
                                    <a href="../../../ibo_panel/production/adhar_card_img/<?php echo $ssss['d_id']; ?>f.jpg" target="_blank">Click here to view front adhar image</a>
                                </td>
                                <td>
                                    <a href="../../../ibo_panel/production/adhar_card_img/<?php echo $ssss['d_id']; ?>b.jpg" target="_blank">Click here to view back adhar image</a>
                                </td>
                                <td>
                                    <?php echo $R['status']; ?>
                                </td>
                                <form method="post">
                                
                                <td>
                                    <input type="hidden" name="ka_id" value="<?php echo $R['ka_id']; ?>">
                                <input type="hidden" name="d_id" value="<?php echo $R['d_id']; ?>">
                                <input type="hidden" name="amount" value="<?php echo $R['']; ?>">
                                
                                <input type="submit" name="clear_submit" value="Approve" class="btn btn-success">
                                <input type="submit" name="clear_reject" value="Reject" class="btn btn-danger">
                                
                                </td>
                                </form>
                                <?php 
                                } ?>
                      </tbody>
                    </table>
                     
                     <?php 
                     if(isset($_POST[clear_submit]))
                     {
                         $csc="SELECT * FROM `distributor` WHERE `d_id`='$_POST[d_id]'";
                         $dscsdf=$con->query($csc);
                         $cdcdc=mysqli_fetch_assoc($dscsdf);
                         // $amt=$cdcdc[withdrawal_wallet]-$_POST[amount];
                         
                         
                       $sql="UPDATE `kyc_adhar` SET `status` = 'c' WHERE `kyc_adhar`.`ka_id` = '$_POST[ka_id]';";
                       
                       $sql .="UPDATE `kyc_adhar` SET `c_date` = '$date' WHERE `kyc_adhar`.`ka_id` = '$_POST[ka_id]';";
                       $sql .="UPDATE `kyc_adhar` SET `c_time` = '$time' WHERE `kyc_adhar`.`ka_id` = '$_POST[ka_id]';";
                       $sql .="UPDATE `distributor` SET `adhar_status` = 'c' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                       $sql .="UPDATE `distributor` SET `adhar_card_no` = '$_POST[adhar_no]' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                        if ($con->multi_query($sql) === TRUE) {
                          echo "<script>alert('Aadhar Card Approved successfully');
                          location.href='new_kyc.php'</script>";
                        } else {
                          echo "<script>alert('Query Failed, Please try again');
                          location.href='new_kyc.php'</script>";
                        }
                     }
                     if(isset($_POST[clear_reject]))
                     {
                         $csc1="SELECT * FROM `distributor` WHERE `d_id`='$_POST[d_id]'";
                         $dscsdf1=$con->query($csc1);
                         $cdcdc1=mysqli_fetch_assoc($dscsdf1);
                         // $amt=$cdcdc[withdrawal_wallet]-$_POST[amount];
                         
                         
                       $sql1="UPDATE `kyc_adhar` SET `status` = 'n' WHERE `kyc_adhar`.`ka_id` = '$_POST[ka_id]';";
                       
                       $sql1 .="UPDATE `kyc_adhar` SET `n_date` = '$date' WHERE `kyc_adhar`.`ka_id` = '$_POST[ka_id]';";
                       $sql1 .="UPDATE `kyc_adhar` SET `n_time` = '$time' WHERE `kyc_adhar`.`ka_id` = '$_POST[ka_id]';";
                       $sql1 .="UPDATE `distributor` SET `adhar_status` = 'n' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                       
                        if ($con->multi_query($sql1) === TRUE) {
                          echo "<script>alert('Aadhar Card Rejected successfully');
                          location.href='kyc_adhar.php'</script>";
                        } else {
                          echo "<script>alert('Query Failed, Please try again');
                          location.href='kyc_adhar.php'</script>";
                        }
                     }
                     if(isset($_GET[d_id]))
                     {
                         $csc2="SELECT * FROM `distributor` WHERE `d_id`='$_GET[d_id]'";
                         $dscsdf2=$con->query($csc2);
                         $cdcdc2=mysqli_fetch_assoc($dscsdf2);
                         // $amt=$cdcdc[withdrawal_wallet]-$_POST[amount];
                         
                         
                       $sql2="UPDATE `kyc_adhar` SET `status` = 'n' WHERE `kyc_adhar`.`d_id` = '$_GET[d_id]';";
                       
                       $sql2 .="UPDATE `kyc_adhar` SET `n_date` = '$date' WHERE `kyc_adhar`.`d_id` = '$_GET[d_id]';";
                       $sql2 .="UPDATE `kyc_adhar` SET `n_time` = '$time' WHERE `kyc_adhar`.`d_id` = '$_GET[d_id]';";
                       $sql2 .="UPDATE `distributor` SET `adhar_status` = 'n' WHERE `distributor`.`d_id` = '$_GET[d_id]';";
                       
                        if ($con->multi_query($sql2) === TRUE) {
                          echo "<script>alert('Aadhar Card Rejected successfully');
                          location.href='d_detail.php?d_id=$_GET[d_id]'</script>";
                        } else {
                          echo "<script>alert('Query Failed, Please try again');
                          location.href='d_detail.php?d_id=$_GET[d_id]'</script>";
                        }
                     }
                     ?>
                     
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
            © 2020 Dreamsway. All Rights Reserved</a>
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


