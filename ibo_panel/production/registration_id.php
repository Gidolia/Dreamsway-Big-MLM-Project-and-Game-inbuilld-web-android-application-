<?php include "../../database_connect.php";
session_start();
session_destroy();
function isNumber($c) {
    return preg_match('/[0-9]/', $c);
}?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DREAMSWAY | Login</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
              <h1>Registration Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Sponser ID" name="s_id" required="" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="name" name="name" required="" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="mobile" name="mobile" required="" />
              </div>
              <div>
                <input type="password" class="form-control" value="123" placeholder="Password" name="password" required="" />
              </div>
              <div>
                 <input type="submit" name="sub_login" class="btn btn-primary" value="Log in">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Forget Password?
                  <a href="#signup" class="to_register"> Find Password </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> DREAMSWAY SURE</h1>
                  <p>©2019 All Rights Reserved. dreamsway sure(opc) pvt ltd || developed by eibo services Pvt Ltd</p>
                </div>
              </div>
            </form>
          </section>
        </div>

<?php
if(isset($_POST[sub_login]))
{
    session_start();

    $ins="INSERT INTO `distributor` (`d_id`, `s_id`, `name`, `dob`, `mobile`, `a_mobile`, `password`, `addreass`, `city`, `state`, `pancard_no`, `adhar_card_no`, `reg_date`, `reg_time`, `a_status`, `a_date`, `a_time`, `withdrawal_wallet`, `recharge_wallet`, `ludo_wallet`, `pin_wallet`, `pan_a`, `tds_wallet`) VALUES (NULL, '$_POST[s_id]', '$_POST[name]', '', '$_POST[mobile]', '', '$_POST[password]', '', '', '', '', '', '$date', '$time', 'n', '', '', '0', '0', '0', '0', 'n', '0');";
    if($con->query($ins)===TRUE)
    {
        echo "<script>alert('Registered Sucessfully'); location.href='registration_id.php';</script>";
    }
    else{
        echo "<script>alert('Failed Please try again'); location.href='registration_id.php';</script>";
    }
    
}

?>



        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="post">
              <h1>Forget Password</h1>
              <div>
                <input type="text" name="f_d_id" class="form-control" placeholder="ID" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" name="send_pass" value="Send Password to mobile">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Back to login ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> WIND SON GROUP</h1>
                  <p>©2019 All Rights Reserved. WIND SON GROUP || developed by Gidolia Pvt Ltd</p>
                </div>
                <?php
if(isset($_POST[send_pass]))
{
    $que=mysql_query("SELECT `d_id`, `mobile`, `password` FROM `distributor` WHERE `d_id`=$_POST[f_d_id]")or die("query fail to execute");
    if(mysqli_num_rows($que)!=0)
    {
        $ibp=mysql_fetch_assoc($que);
        $dd='Your Password = '.$ibp[password];
$dd = str_replace(' ', '%20', $dd);
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=INAURA&smstype=TRANS&numbers='.$ibp[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo "<script>alert('Password sended sucessfully to your register mobile number');</script>";
    }
    else{echo "<script>alert('Invalid User ID');
    location.href='login.php';</script>";}
}

?>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
