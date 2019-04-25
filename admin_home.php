<?php 
session_start();
if(!isset($_SESSION['name']))
{
header("location:admin.php");
}
include 'admin_nav.php';
?>
