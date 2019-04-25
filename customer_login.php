<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Customer Login</title>
    <style>
        input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
input[type=submit]{
	width: 20%;
	height:30px;
	background-color:#71ff71;
}
label{
	font-size: 20px;
}
form{
	border-color: black;
	border-style: solid;
	width: 50%;
	padding: 20px;
	background-color: #dcdcff;
	margin-left:23%;
}
</style>
</head>

<body background="bus.jpg">
    <form action="" method="post">
        <label>username:</label><br><input type="text" name="username"><br>
        <label>password:</label><br><input type="password" name="password"><br>
        <?php if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = -1;
        } ?>
        <input type="hidden" name="busno" value="<?php echo $id; ?>">
        <input type="submit" name="submit" value="submit"><br>
        Not Registered?
        <a href="customer_registration.php">Click to Register</a>
    </form>




</body>

</html>
<?php 

if (isset($_POST['submit'])) {
    require 'config.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username != null && $password != null) {
        $q = mysqli_query($connect, "SELECT * FROM customer_details WHERE uname = '$username' AND password = '$password'");
        $r = mysqli_num_rows($q);
        $row = mysqli_fetch_array($q);
        if ($r == 1 && $row['status'] == "1") {
            $cid = $row['cid'];
            $_SESSION['cid'] = $cid;
            $_SESSION['name'] = $username;
            if ($_POST['id'] == -1) {
                header("location:index.php");
            } else {
                $busno = $_POST['id'];
                header("location:index.php");
            }
        } else if ($row['status'] == "0") {
            ?>
<script type="text/javascript">
    alert("sorry, your account is blocked, contact administrator for accout activation");
    window.location.href = "/pass/customer_login.php";
</script>
<?php

} else {
    ?>
<script type="text/javascript">
    alert("check username and password");
    window.location.href = "/pass/customer_login.php";
</script>
<?php

}
}
}
?> 