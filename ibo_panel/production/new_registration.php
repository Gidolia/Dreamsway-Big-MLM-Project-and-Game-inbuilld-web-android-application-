<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dreamsway | New registration</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">


    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script>
    function validateForm() {
 	var ser_name = document.forms["myForm"]["s_name"].value;
	var password = document.forms["myForm"]["password"].value;
	var c_password = document.forms["myForm"]["c_password"].value;
	var mobile_no = document.forms["myForm"]["mobile_ck"].value;
	if(mobile_no=="This Mobile Number is Already Register")
	{
	    document.getElementById("text_mob").innerHTML = " This Mobile Number is Already Register ";
    return false;
	}
	if(mobile_no=="Please Check Your Mobile Number")
	{
	    document.getElementById("text_mob").innerHTML = " Please Check Your Mobile Number ";
    return false;
	}
	  if (password != c_password)
		  {
    document.getElementById("cp_msg").innerHTML = " Confirm Password didnt matched to password ";
    return false;
		  }
		  
	
	if(ser_name == "")
		{
			document.getElementById("upline_msg").innerHTML = " Please Check Upline no. ";
			return false;
		}
	if(ser_name == "Please check your upline number")
		{
			document.getElementById("upline_msg").innerHTML = " Please Check Upline no. ";
			return false;
		}
		
	
}
    
    
   function showHint(str) {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").value = this.responseText;
		 // document.getElementById("txtg").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "get_name.php?q=" + str, true);
    xmlhttp.send();
  
}
function showHint_mob(str) {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint_mob").value = this.responseText;
        if(this.responseText != "Correct")
				{
					document.getElementById("text_mob").innerHTML = this.responseText;
				}
		else{ document.getElementById("text_mob").innerHTML = "";
		}
        
      }
    };
    xmlhttp.open("GET", "get_hint_mob.php?q=" + str, true);
    xmlhttp.send();
  
}

</script>
    
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
                <h3>New Registration</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add New Member</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                    <form class="form-horizontal form-label-left" method="post" name="myForm" onsubmit="return validateForm()">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Sponser ID</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="s_id" value="<?php echo $_SESSION[d_id];?>" onKeyUp="showHint(this.value)">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Sponser Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="s_name" value="<?php echo $d_detail[name];?>" id="txtHint" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <span id="upline_msg" style="color: red"></span>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="name" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Mobile</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="mobile" onKeyUp="showHint_mob(this.value)" required>
                          <span class="fa fa-mobile form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <span id="text_mob" style="color: red"></span>
								<span id="text_mobw" style="color: red"></span>
								<input type="hidden" name="mobile_ck" value="Please Check Your Mobile Number" id="txtHint_mob" readonly />
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="password" class="form-control" name="password"  required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Confirm Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="password" class="form-control" name="c_password"  required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <span id="cp_msg" style="color: red"></span>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Register Member" name="sub_reg">
                        </div>
                      </div>
                     </form>

                    </div>
                  </div>
                </div>
            </div>
            </div>

            <?php
	if(isset($_POST[sub_reg]))
	{
	    function isNumber($c) {
            return preg_match('/[0-9]/', $c);
        }
        
            $string=$_POST[s_id];
               
            $chars = '';
            $ssd_id = '';
            for ($index=0;$index<strlen($string);$index++) {
                if(isNumber($string[$index]))
                {
                    $ssd_id .= $string[$index];
                }
                else {
                    $chars .= $string[$index];}
            
            }
            
            
            //////////////////////////////
function password_generate($chars) 
{
  $data = '123456789';
  return substr(str_shuffle($data), 0, $chars);
}
for($x=0; $x<100; $x++)
{
    //echo $x;
    $d_id=password_generate(6);
    $sqsqqs="SELECT * FROM `distributor` WHERE `d_id`='$d_id'";
    $qur=$con->query($sqsqqs);
    if(mysqli_num_rows($qur)==0)
    {
        break;
    }
}
            
            
	    $s_d="SELECT * FROM `distributor` WHERE `d_id`='$ssd_id'";
	    $d=$con->query($s_d);
	    if($d->num_rows>0)
	    {
	        if($_POST[password]==$_POST[c_password])
	        {
	           
	            $ss="INSERT INTO `distributor` (`d_id`, `s_id`, `name`, `dob`, `mobile`, `a_mobile`, `password`, `addreass`, `city`, `state`, `pancard_no`, `adhar_card_no`, `reg_date`, `reg_time`, `a_status`, `a_date`, `a_time`, `withdrawal_wallet`, `recharge_wallet`, `ludo_wallet`, `pin_wallet`, `pan_a`, `tds_wallet`, `block_status`) VALUES ('$d_id', '$ssd_id', '$_POST[name]', '', '$_POST[mobile]', '', '$_POST[password]', '', '', '', '', '', '$date', '$time', 'n', '', '', '0', '0', '0', '0', 'n', '0', 'n');";
	            if($con->query($ss)===TRUE)
	            {
	                ////////////////////for sending sms
	                $message='Welcome '.$_POST[name].' You are sucessfully Register Your ID=DS'.$d_id.' and Pass='.$_POST[password].' Dreamsway Sure Pvt Ltd';
                    send_sms($_POST[mobile], $message, 'New Registration', $d_id);
            		///////////
	                echo "<script>location.href='new_registration_detail.php?d_id=".$d_id."';</script>";
	            }
	            else{
	                $ef="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'New Registration');";
	                $con->query($ef);
	                echo "<script>alert('Query Failed! Plz try again');location.href='new_registration.php';</script>";
	                
	            }
	        }else{echo "<script>alert('Password And Confirm Password Did not Matched');location.href='new_registration.php';</script>";}
	    }else{echo "<script>alert('Sponser Is incorrect plz try Again');location.href='new_registration.php';</script>";}
	}
	?>
            
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            © 2020 Dreamsway. All Rights Reserved
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
