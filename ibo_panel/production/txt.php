<?php
//{"STATUSCODE":"0","STATUSMSG":"Success","REFNO":"123","TRNID":13387176,"TRNSTATUS":1,"TRNSTATUSDESC":"Success","OPRID":"1056520897","BAL":2000.0}
/*$response="0 Success 128543 13387248 0 In Process 1980.42";
$str_arr = explode (" ", $response);
echo $str_arr[1];
*/
$jsonobj = '{"STATUSCODE":"0","STATUSMSG":"Success","REFNO":"123","TRNID":13387176,"TRNSTATUS":1,"TRNSTATUSDESC":"Success","OPRID":"1056520897","BAL":2000.0}';

$obj = json_decode($jsonobj);

echo $obj->STATUSMSG;
echo $obj->TRNSTATUS;

?>