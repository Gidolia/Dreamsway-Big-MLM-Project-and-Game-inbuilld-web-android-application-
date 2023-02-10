<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dreamsway</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">


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
                
              </div>

            </div>

            <div class="clearfix"></div>
<div class="row">
            
            </div>
            
            </div>
            <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Submit Bank Detail</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <?php
                  
$zx="SELECT * FROM `kyc_bank` WHERE `d_id`='$_SESSION[d_id]' AND `status`='c'";
                  $xz=$con->query($zx);
	if($xz->num_rows!=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-success"><b>SUCCESS !</b> Bank Detail Submited Successfully</div>
<?php
} else{
$x="SELECT * FROM `kyc_bank` WHERE `d_id`='$_SESSION[d_id]' AND `status`='n'";
                  $z=$con->query($x);
	if($z->num_rows!=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-danger"><b>sorry !</b> you have not provided actual information try again or photo is not clear</div>
<?php
}
                  $s="SELECT * FROM `kyc_bank` WHERE `d_id`='$_SESSION[d_id]' AND `status`='p'";
                  $k=$con->query($s);
	if($k->num_rows!=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-info"><b>submited!</b> this photo may take some hour for verification</div>
<?php
}
else{ ?> 
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Bank Passbook photo</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="file" class="form-control" name="bank_pass" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Bank Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="bank_name" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Bank ACC No.</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="acc_no" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">IFSC Code.</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="ifsc" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          
                          <input type="submit" class="btn btn-success" value="Submit Bank Detail" name="bank_submit">
                        </div>
                      </div>
                     </form>
<?php } } ?>
                    </div>
                  </div>
                </div>
            </div>
            
            
            
            
            
            </div>
                   <?php 
            
            
   ////////////////////////////////////////////////////////////////
   ////////////////////////////////////////////////////////////////////////////
            if(isset($_POST[submit_adhar]))
            {
            echo "123";
            	if (file_exists("adhar_card_img/" .$_SESSION['d_id']."f.jpg"))
        {
        unlink("adhar_card_img/" .$_SESSION['d_id']."f.jpg");
          echo $_SESSION['d_id']."f.jpg" . " already exists. ";
        }
        if (file_exists("adhar_card_img/" .$_SESSION['d_id']."b.jpg"))
        {
        unlink("adhar_card_img/" .$_SESSION['d_id']."b.jpg");
          echo $_SESSION['d_id']."b.jpg" . " already exists. ";
        }
        
        if(move_uploaded_file($_FILES["adharf"]["tmp_name"], "adhar_card_img/".$_SESSION['d_id']."f.jpg"))
		{
		if(move_uploaded_file($_FILES["adharb"]["tmp_name"], "adhar_card_img/".$_SESSION['d_id']."b.jpg"))
		{
            echo "Stored in: " . "adhar_card_img/".$fileName;
            
            $que="INSERT INTO `kyc_adhar` (`ka_id`, `d_id`, `adhar_no`, `adhar_front_img`, `adhar_back_img`, `date`, `time`, `status`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[adhar_no]', '$_SESSION[d_id]f.jpg', '$_SESSION[d_id]b.jpg', '$date', '$time', 'p');";
            if($con->query($que)===TRUE)
            {
            echo "<script>alert('adhar submited Sucessfully');
		location.href='kyc.php';</script>";
            }
            else{ echo "<script>alert('Query failed please try again');
		location.href='kyc.php';</script>";}
            }
            }
            }
  ///////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
         if(isset($_POST[bank_submit]))
            {
            echo "123";
            	if (file_exists("bank_img/" .$_SESSION['d_id'].".jpg"))
        {
        unlink("bank_img/" .$_SESSION['d_id'].".jpg");
          echo $_SESSION['d_id'].".jpg" . " already exists. ";
        }
        if(move_uploaded_file($_FILES["bank_pass"]["tmp_name"], "bank_img/".$_SESSION['d_id'].".jpg"))
		{
            echo "Stored in: " . "bank_img/".$fileName;
            $que1="INSERT INTO `kyc_bank` (`kb_id`, `d_id`, `bank_acc_no`, `bank_name`, `bank_img`, `ifsc_code`, `date`, `time`, `status`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[acc_no]', '$_POST[bank_name]', '$_SESSION[d_id].jpg', '$_POST[ifsc]', '$date', '$time', 'p');";
            if($con->query($que1)==TRUE)
            {
                echo "<script>alert('bank detail submited Sucessfully');
		location.href='kyc.php';</script>";
            }
            else{ echo "<script>alert('Query failed please try again');
		location.href='kyc.php';</script>";}
            }
            }
            
            ///////Pan Card Details
            if(isset($_POST[pan_submit]))
            {
            echo "123";
            	if (file_exists("pan_card_img/" .$_SESSION['d_id'].".jpg"))
        {
        unlink("pan_card_img/" .$_SESSION['d_id'].".jpg");
          echo $_SESSION['d_id'].".jpg" . " already exists. ";
        }
        if(move_uploaded_file($_FILES["pan"]["tmp_name"], "pan_card_img/".$_SESSION['d_id'].".jpg"))
		{
            echo "Stored in: " . "pan_card_img/".$fileName;
            $que1="INSERT INTO `kyc_pan` (`kp_id`, `d_id`, `pan_no`, `pan_img`,  `date`, `time`, `status`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[pan_no]', '$_SESSION[d_id].jpg', '$date', '$time', 'p');";
            if($con->query($que1)==TRUE)
            {
                echo "<script>alert('Pan detail submited Sucessfully');
		location.href='kyc.php';</script>";
            }
            else{ echo "<script>alert('Query failed please try again');
		location.href='kyc.php';</script>";}
            }
            }
            ?>     
            

            

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
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
