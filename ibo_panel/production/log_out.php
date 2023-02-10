<?php 

error_reporting(E_ALL);
include "../../database_connecct.php";

session_start();
session_destroy();
echo "<script>location.href='../../login';</script>";