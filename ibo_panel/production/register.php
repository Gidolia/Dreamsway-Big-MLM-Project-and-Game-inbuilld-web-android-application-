<form method="post">
    Name=<input type="text" name="name"><br>
    sponser id=<input type="text" name="s_id"><br>
    <input type="submit" name="confirm">
</form>




<?php
include "config.php";

if(isset($_POST[confirm]))
{
    $ds="INSERT INTO `distributor` (`d_id`, `s_id`, `name`, `dob`, `mobile`, `a_mobile`, `password`, `addreass`, `city`, `state`, `pancard_no`, `adhar_card_no`, `reg_date`, `reg_time`, `a_status`, `a_date`, `a_time`, `withdrawal_wallet`, `recharge_wallet`, `ludo_wallet`, `pin_wallet`, `pan_a`, `tds_wallet`) VALUES (NULL, '$_POST[s_id]', '$_POST[name]', '', '', '', '123', '', '', '', '', '', '$date', '$time', 'n', '', '', '', '', '', '', '', '');";
    $con->query($ds);
}