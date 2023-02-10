
<?php include "config.php";
////////////////for create unique id
function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}
for($x=0; $x<100; $x++)
{
    //echo $x;
    $pas=password_generate(10);
    $sqsqqs="SELECT * FROM `temp_txn_handler` WHERE `product_unique_id`='$pas'";
    $qur=$con->query($sqsqqs);
    if(mysqli_num_rows($qur)==0)
    {
        break;
    }
}
////////////////////////////////////////////////
//////////////////////////////////////////////
/////////////////////////////////////////////////////for pay u money code
// Merchant key here as provided by Payu
$MERCHANT_KEY = "PV2JTHHI";

// Merchant Salt as provided by Payu
$SALT = "z7H0Q2K5VO";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
		  
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
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
    <title>DREAMSWAY || Upgrade id</title>

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
    <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
    function validateForm(str) {
        var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "get_hint.php?q=" + str, true);
    xmlhttp.send();
    }
  </script>
    <script>
    /*function check(e)
    {
    alert(e.keyCode);
    }*/
    document.onkeydown = function(e) {
            if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117)) {//Alt+c, Alt+v will also be disabled sadly.
                alert('not allowed');
            }
            return false;
    };
    </script>
    
  </head>

  <body class="nav-md" onload="submitPayuForm()">
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
                <h3>Confirm Add Money</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Confirm Add Money</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table class="table table-striped table-bordered">
                          <thead><tr><th>Your Current Withdrawal Balance</th><th><?php echo $d_detail[main_wallet]+0;?></th></tr></thead>
                          </table>
                      <form class="form-horizontal form-label-left" action="<?php echo $action; ?>" method="post" name="payuForm">
<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <input type="hidden" class="form-control" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? $pas : $posted['productinfo'] ?>">
      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" required="required" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? $_POST['name'] : $posted['firstname']; ?>" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Mobile</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" required="required" class="form-control" name="phone" value="<?php echo (empty($posted['phone'])) ? $_POST['phone'] : $posted['phone']; ?>" readonly>
                          <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" required="required" class="form-control" name="email" value="<?php echo (empty($posted['email'])) ? $_POST['email'] : $posted['email']; ?>" readonly>
                          <span class="fa fa-mail form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                          
                        
                          
                          
                          <input type="hidden" class="form-control" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? $pas : $posted['productinfo'] ?>">
                          <input type="hidden" class="form-control" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>">
                        
                          <?php $amountr=$_POST['amountg']*2/100;
                            $amounr=$_POST['amountg']+$amountr;
                            //echo $amounr;
                          ?>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Amount to Add</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <?php echo $_POST['amountg'];?>
                          <input type="hidden" class="form-control" name="amount" value="<?php echo (empty($posted['amount'])) ? $amounr : $posted['amount'] ?>" readonly>
                          <span class="fa fa-mail form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                          
                        
                        
                        
                      <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                      
                          <input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? 'http://dreamsway.in/ibo_panel/production/process_add_money.php?statusd=s' : $posted['surl'] ?>" size="64" />
                          <input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? 'http://dreamsway.in/ibo_panel/production/process_add_money.php?statusd=f' : $posted['furl'] ?>" size="64" />
                          <?php
      $cvbnm="SELECT * FROM `temp_txn_handler` WHERE `txn_id`='$txnid'";
      $dcvbnm=$con->query($cvbnm);
      if($dcvbnm->num_rows==0)
      {
      $dscsvsvvv="INSERT INTO `temp_txn_handler` (`tth_id`, `d_id`, `txn_id`, `date`, `time`, `status`, `name`, `mobile`, `email`, `month`, `amount`, `collected_amount`, `per_month_amount`, `plan`, `voucher_code`, `product_unique_id`) VALUES (NULL, '$_SESSION[d_id]', '$txnid', '$date', '$time', 'open', '$d_detail[name]', '$d_detail[mobile]', '$_POST[email]', '', '$_POST[amountg]','$amounr', '', '', '', '$pas');";
      if($con->query($dscsvsvvv)===TRUE)
      {
						   if(!$hash) { ?>
                          <input type="submit" name="submit_data" class="btn btn-success">
                          <?php } }
                          }?>
            
            </div>
            </div>
            </div></div>
            </div></div>
            
            
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
