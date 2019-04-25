<?php 

require 'nav.php';
$id = $_GET['id'];
if (!isset($_SESSION['cid'])) {
    header("location:customer_login.php?id=$id");
}
require('config.php');
$q = mysqli_query($connect, "SELECT * from bus_details WHERE id ='$id' ");
if ($q)
    $row = mysqli_fetch_array($q);
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        span {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div style="background-color:skyblue; height: 50px; margin-top: 0;">
        <h2 style="padding:10px;"> Pass details</h2>
    </div>
    <br>

    <?php 
    $name = $_SESSION['name'];
    $source = $row['source'];
    $dest = $row['destination'];
    $fare = $row['fare'];
    $fare = $fare * 30;
    $date1 = $_SESSION['date1'];
    $duedate = $_SESSION['duedate'];
    $q = mysqli_query($connect, "insert into request (user,source,destination,vfrom,vto,fare) values ('$name','$source','$dest','$date1','$duedate','$fare') ");
    $_SESSION['date1'] = "";
    $_SESSION['duedate'] = "";
    header("location:viewpass.php");
    ?>
</body>

</html> 