<!DOCTYPE html>
<html>
<head>
	<title>Customer Registration </title>
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
<form action="" method="post" enctype="multipart/form-data">
	
	first name <input type="text" name="fname"><br>
	last name <input type="text" name="lname"><br>
	username<input type="text" name="uname"><br>
	password <input type="password" name="pass"><br>
	type<select name="type">
	<option value="student">Student</option>
	<option value="senior_citizon">Senior Citizon</option></select>
	Aadhar<input type="file" name="image" /><br>
	
	<input type="submit" name="submit" value="submit"><br>Already Registered?
<a href="customer_login.php">Click to Login</a>

</form>


</body>
</html>

<?php require 'config.php';
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$username=$_POST['uname'];
	$password=$_POST['pass'];
	$type=$_POST['type'];
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$a="1";

	$q=mysqli_query($connect,"insert into customer_details (fname,lname,uname,password,status,aadhar,type) values ('$fname','$lname','$username','$password','$a','$image','$type')") ;
	if ($q) {
		echo "success";
		
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("try different username");
		</script><?php
	}
}

 ?>