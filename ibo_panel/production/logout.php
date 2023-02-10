<?php include "../../database_connecct.php";
session_start();
session_destroy();
echo "<script>location.href='/';</script>";