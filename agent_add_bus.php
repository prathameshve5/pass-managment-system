<?php require 'admin_nav.php';
session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>add bus</title>
    <style>
        input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
input[type=number]{
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
input[type=submit]{
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    background-color: #33f1f1;
}
input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
select{
	 width:50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
form{
	width: 50%;
	margin-left: 25%;
	
	padding: 25px;
}
</style>

</head>

<body background="bus.jpg">
    <br><br><br>

    <form action="" method="post">

        <label for="source">Source</label><br>
        <input type="text" name="source" id="source"><br>
        <label for="des">destination</label><br>
        <input type="text" name="des" id="des"><br>
        <label for="fare">Fare</label><br>
        <input type="number" name="fare" id="fare"><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>


<?php 

if (isset($_POST['submit'])) {

    $source = $_POST['source'];
    $des = $_POST['des'];
    $fare = $_POST['fare'];
    require 'config.php';

    $q = mysqli_query($connect, "INSERT INTO bus_details (source,destination,fare) VALUES ('$source','$des','$fare')");
    if ($q) {
        echo "yes";
    } else {
        echo "no";
    }
}
?> 