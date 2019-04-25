<?php 
$id = $_GET['id'];
require 'config.php';
$status = "0";
$q= mysqli_query($connect,"UPDATE customer_details SET status = '$status' WHERE cid = '$id'");
if ($q) {
	header("location:ad_customer_mana.php");
}
 ?>