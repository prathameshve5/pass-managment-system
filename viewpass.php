<?php 
require 'nav.php';
require 'config.php';

$name = $_SESSION['name'];
$q = mysqli_query($connect, "select MAX(id) from pass_details where name= '$name'");

$row = mysqli_fetch_array($q);

$row1 = $row[0];

$q1 = mysqli_query($connect, "select * from pass_details where id='$row1'");
$row2 = mysqli_fetch_array($q1);
?>

<head>
    <style>
        .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-top: 10px;
    }
    </style>
</head>
<div id="printableArea">
    <div id="print-content">
        <div style="border-style: solid; width: 50%; margin-left: 25%;, margin_top:10%;"> <span style="padding:20px;">
                Name :
                <?php echo $_SESSION['name']; ?> <br><span style="padding:20px;">
                    source:
                    <?php echo $row2[2]; ?></span><br><span style="padding:20px;">
                    destination :
                    <?php echo $row2[3]; ?></span><br>
                <span style="padding:20px;">Fare for month :
                    <?php echo $row2[6]; ?></span><br>
                <span style="padding:20px;">valid from:
                    <?php echo $row2[4]; ?> to
                    <?php echo $row2[5]; ?>

        </div>
    </div>
</div>
<center><input type="button" onclick="printDiv('printableArea')" value="print" class="button" /></center>

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script> 