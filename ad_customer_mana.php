<?php 
require 'admin_nav.php'; ?><!DOCTYPE html>
<html>
<head>
	<title>customer management</title>
	<style type="text/css">
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
	</style>
</head>
<body>
	<div style="padding:20px; border-style: solid; margin: 20px;">
	<table>
	<thead>
		<tr>
			<th>id</th>
			<th>username</th>
			<th>name</th>
			<th>aadhar</th>
			<th>type</th>
			<th>status</th>
			<th>action</th>
			<th>delete</th>
		</tr>
	</thead>
	<tbody>
		<?php require 'config.php';
		$q= mysqli_query($connect, "select * from customer_details");
		while ($row = mysqli_fetch_array($q)) {
		 	?><td><?php echo $row['cid']; ?></td>
		 	<td><?php echo $row['uname']; ?></td>
		 	<td><?php echo $row['fname']." ".$row['lname'];?></td>
			 <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['aadhar']).'" height="150" width="250">';?></td>
			 <td><?php echo $row['type'];?></td>
		 	<td><?php if ($row['status']=="0")

		 	echo "not allowed"; else echo "allowed"; ?></td>
		 	<td><?php if ($row['status']=="0") {

		 ?><a href="/pass/callow.php?id=<?php echo $row['cid'];?>" >allow</a><?php } else {

		 ?><a href="/pass/cnotallow.php?id=<?php echo $row['cid'];?>" >not allow</a><?php }  ?></td> 
		 <td><a href="/pass/delete.php?id=<?php echo $row['cid'];?>">delete</a></td></tr>
		 	<?php
		 } ?>
		
	</tbody>
</table>
</div>
</body>
</html>