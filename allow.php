<?php 
$id = $_GET['id'];
require 'config.php';
$status = "1";
$q= mysqli_query($connect,"UPDATE agent_details SET status = '$status' WHERE a_id = '$id'");
if ($q) {
	header("location:ad_approve_agent.php");
}
 ?>