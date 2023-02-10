<?php
session_start();
unset($_SESSION[ibo_id]);
unset($_SESSION[ibo_password]);
header("location:login.php#signin");
?>
