<?php session_start();
if (isset($_SESSION['name'])) {
        header("location:admin_home.php");
    } ?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <style>
        input[type=text] {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
input[type=password] {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
</style>
</head>

<body background="bus.jpg">
    <form action="" method="post">
        username:<input type="text" name="username"><br>
        password:<input type="password" name="password"><br>

        <input type="hidden" name="busno" value="<?php echo $id; ?>">
        <input type="submit" name="submit" value="submit">
    </form>




</body>

</html>
<?php 

if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == "admin" && $password == "admin") {
                $_SESSION['name'] = $username;
                header("location:admin_home.php");
            } else {
                ?>
<script type="text/javascript">
    alert("wrong username or password");
</script>
<?php

}
}
?> 