<?php
include_once "lib/config.php";
include_once "lib/Staff.php";

session_start();
$Staff=new Staff();

$_login=$Staff->login_auth();

if($_login==null && !strpos($_SERVER['PHP_SELF'],"login")){
    header("Location:login.php");
    exit();
}