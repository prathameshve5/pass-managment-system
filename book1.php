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

    <form action="book.php?id=<?php echo $id;  ?>" method="post">
        <div id="print-content">
            <div style="border-style: solid; width: 50%; margin-left: 25%;"> <span style="padding:20px;">
                    Name :
                    <?php echo $_SESSION['name']; ?> <br><span style="padding:20px;">
                        source:
                        <?php echo $row['source']; ?></span><br><span style="padding:20px;">
                        destination :
                        <?php echo $row['destination']; ?></span><br>
                    <span style="padding:20px;">Fare for month :
                        <?php $fare = $row['fare'];
                        $fare = $fare * 30;
                        echo $fare; ?></span><br>
                    <span style="padding:20px;">valid from:
                        <?php echo $_SESSION['date1']; ?> to
                        <?php echo $_SESSION['duedate']; ?>

            </div>
        </div>
        <input type="submit" value="confirm" />
    </form>



</body>


</html> 