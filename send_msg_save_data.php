<form method="post">
    mobile no <input type="number" name="number">
    <br>
    email <input type="email" name="email">
    <br>
    Msg <textarea name="msg" rows="25" cols="50">
        
        Dear Candidate:
You have applied for CEN 2021 (MBMVNT)
Examination. Please Find below your exam
Information and use the give login credentials
To View/ Print your exam City intimation
Advice.
Name-
Roll No.-
registration No-
Exam City- Gwalior
Exam Center Shehaj Shikchha niketan school baaj Togiz k samne Morar
Shift- Shift 1
Reporting Time- 09:00 AM TO 10:00 AM
(MBMVNT)
    </textarea>
        <input type="submit" name="submitd">
    </form>
    <?php
    include "database_connect.php";
    if(isset($_POST[submitd]))
    {
        $dd = str_replace(' ', '%20', $_POST[msg]);
	$url = 'http://sms.hspsms.com/sendSMS?username=dreamsway&message='.$dd.'&sendername=DREAMS&smstype=TRANS&numbers='.$_POST[number].'&apikey=a238e924-ad9e-43aa-80c4-8e8d51ba092b';
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	
	
	
        $sd="INSERT INTO `test_sms` (`ts_id`, `mobile`, `msg`, `email`) VALUES (NULL, '$_POST[number]', '$_POST[msg]', '$_POST[email]');";
        if($con->query($sd)===TRUE)
        {
            echo $response;
            echo "<script>alert('Data Entered Successfully'); location.href='send_msg_save_data.php';</script>";
        }
        else{
            echo "<script>alert('failed'); location.href='send_msg_save_data.php';</script>";
        }
    }