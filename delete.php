<?php 
require('config.php');
$id=$_GET['id'];
mysqli_query($connect,"delete from customer_details where cid='$id'");
header("location:ad_customer_mana.php");
?>