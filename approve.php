<?php 
require('config.php');
$name = $_POST['name'];
    $q = mysqli_query($connect, "select max(requestid) from request where user = '$name'");
    $row = mysqli_fetch_array($q);
    $row1 = $row[0];
    $q1 = mysqli_query($connect, "select * from request where requestid = '$row1'");
    $row2 = mysqli_fetch_array($q1);
    $name = $row2[1];
    $source = $row2[2];
    $dest = $row2[3];
    $fare = $row2[6];
    $date1 = $row2[4];
    $duedate = $row2[5];
    $q = mysqli_query($connect, "insert into pass_details (name,source,destination,vfrom,vto,fare) values ('$name','$source','$dest','$date1','$duedate','$fare') ");
   header("location:request.php");
   ?>