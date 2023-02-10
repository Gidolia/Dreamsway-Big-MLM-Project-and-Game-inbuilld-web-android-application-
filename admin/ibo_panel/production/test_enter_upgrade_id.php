<form method="get">
    <input type="number" name="id">
    <input type="submit" name="enter_u_id">
</form>
<?php
include "config.php";
include "u_rebirth_function.php";
include "u_function.php";
include "u_runner_rebirth_function.php";
include "u_silver_rebirth_function.php";
include "u_gold_rebirth_function.php";

if(isset($_GET[enter_u_id]))
{
    
    for_finally_entering_bronze_id($_GET[id]);
     echo "<script>alert('ID Entered Successfully');
		location.href='test_enter_upgrade_id.php';</script>";
}
//echo for_distributing_income_bronze_club_tree();
?>