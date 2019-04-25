<?php 
require 'nav.php';
require 'config.php';
$q = mysqli_query($connect, "SELECT DISTINCT source FROM bus_details");
$q1 = mysqli_query($connect, "SELECT DISTINCT destination FROM bus_details");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>


    <style>
        form{
	margin:20px;
}
select,input[type=date]{
	 width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
input[type=submit]{
	 width: 10%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    background-color: green;
}
table {
	border: 2px solid #ddd;
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #3ACFDE;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #3ACFDE;

}
body
{
	margin:0;
	padding: 0;
}
span{
	font-size:20px;
}
tr{
	background-color:gray;
}
</style>
</head>

<body background="bus.jpg">



    <br><br>

    <div style="margin-left: 35%; width: 400px; background-color: rgba(258,255, 255, 0.4); ">

        <form action="" method="post" style="padding: 20px;">
            <span>Select journey date :</span> <br><input type="date" name="date" style="width:100%;"><Br>
            <span>Source:</span> <br><select name="source" style="width:100%;"><br>
                <?php 
                while ($row = mysqli_fetch_array($q)) {
                    ?>
                <option>
                    <?php echo $row['source']; ?>
                </option>
                <?php

            }
            ?>
            </select><br>
            <span>Destination :</span><br><select name="des" style="width:100%;"><br>
                <?php 
                while ($row1 = mysqli_fetch_array($q1)) {
                    ?>
                <option>
                    <?php echo $row1['destination']; ?>
                </option>
                <?php

            }
            ?>
            </select><br>
            <input style="width:50%;" type="submit" name="submit2" value="submit"> </form>
    </div>

    <?php 

    if (isset($_POST['submit2'])) {

        $source = $_POST['source'];
        $des = $_POST['des'];
        $date1 = $_POST['date'];
        $duedate = date('m/d/Y', strtotime('+30 days', strtotime($date1))) . PHP_EOL;
        $date = new DateTime($date1);
        $now = new DateTime();
        if ($date <= $now) {
            ?>
    <script type="text/javascript">
        alert("please select valid date");
        window.location.href = "/pass/index.php";
    </script>
    <?php

}
if ($source == $des) {
    ?>
    <script type="text/javascript">
        alert("Enter different source and destination");
        window.location.href = "/pass/";
    </script>
    <?php

} else if ($source != null && $des != null && $date1 != null) {
    $_SESSION['source'] = $source;
    $_SESSION['des'] = $des;
    $_SESSION['date1'] = $date1;
    $_SESSION['duedate'] = $duedate;
    //echo $_SESSION['des'];
} else {
    ?>
    <script type="text/javascript">
        alert("Enter values properly");
        window.location.href = "/pass/";
    </script>
    <?php

}
$q3 = mysqli_query($connect, "select * from bus_details where source='$source' AND destination='$des'");
?>

    <table>
        <thead>
            <tr>

                <th>source</th>
                <th>destination</th>
                <th>fare</th>


                <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while ($row = mysqli_fetch_array($q3)) {
                ?>
            <tr>

                <td>
                    <?php echo $row['source']; ?>
                </td>
                <td>
                    <?php echo $row['destination']; ?>
                </td>
                <td>
                    <?php echo $row['fare']; ?>
                </td>
                <td><a href="book1.php?id=<?php echo $row['id']; ?>">Book Now</a></td>
            </tr>
            <?php

        } ?>
        </tbody>
    </table>
    <?php 
} ?>
</body>

</html> 